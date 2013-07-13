<?php
namespace i\AppBundle\Services;

class iFacebook extends \Facebook {
    public $scope = array();
    
    public function __construct($config) {

        if (isset($config['scope'])) {
            $this->scope = explode(',', $config['scope']);
        }
        $this->config = $config;
        
        parent::__construct($config);
    }
    
    public function getLoginUrl($params=array()) {
        if ($this->scope) {
            $params['scope'] = $this->scope;
        }        
        return parent::getLoginUrl($params);
    }

    public function makeRequest($url, $params, $ch=null) {
        return parent::makeRequest($url, $params, $ch);
    }
    
    public function get($call, $method = 'GET', $params = array()) {
        try {
            return $this->api($call, $method, $params);
        } catch (\FacebookApiException $e) {
            $res = $e->getResult();
            if ($res['error']['code'] == 2500) {
                $this->setExtendedAccessToken();                
            }
        }
    }
        
    public function publish($call, $data) {
        if ($this->getPermission('publish_actions') == 1) {
            return $this->get($call, 'POST', $data);
        } 
    }
    
    public function getPermission($perm) {
        $perms = $this->get('/me/permissions');
        if (count($perms['data']) && array_key_exists($perm, $perms['data'][0])) {
            return $perms['data'][0][$perm];
        }
        return 0;
    }
}