<?php

namespace i\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Login
 */
class Login implements UserInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $salt;

    /**
     * @var integer
     */
    private $pics;

    /**
     * @var integer
     */
    private $facebookId;

    public function __construct() {
        $this->pics = 0;
        $this->salt = $this->salt = md5(uniqid(null, true));
    }

    public function getUsername() {
        return $this->email;
    }

    public function getRoles() {
        return array('ROLE_USER');
    }

    public function eraseCredentials() {
        
    }

    public function checkPassword($password) {
        return $this->password == hash('sha512', $password . '{' . $this->salt . '}');
    }

    public function createPassword($password) {
        if (!strlen($password)) {
            throw new \Exception('Password cannot be empty');
        }
        
        $this->password = hash('sha512', $password . '{' . $this->salt . '}');        
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Login
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Login
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Login
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Login
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set pics
     *
     * @param integer $pics
     * @return Login
     */
    public function setPics($pics)
    {
        $this->pics = $pics;
    
        return $this;
    }

    /**
     * Get pics
     *
     * @return integer 
     */
    public function getPics()
    {
        return $this->pics;
    }

    /**
     * Set facebookId
     *
     * @param integer $facebookId
     * @return Login
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;
    
        return $this;
    }

    /**
     * Get facebookId
     *
     * @return integer 
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }
}
