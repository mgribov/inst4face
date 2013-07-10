<?php

namespace i\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pic
 */
class Pic
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $loginId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $url;

    /**
     * @var integer
     */
    private $likes;


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
     * Set loginId
     *
     * @param integer $loginId
     * @return Pic
     */
    public function setLoginId($loginId)
    {
        $this->loginId = $loginId;
    
        return $this;
    }

    /**
     * Get loginId
     *
     * @return integer 
     */
    public function getLoginId()
    {
        return $this->loginId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Pic
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
     * Set url
     *
     * @param string $url
     * @return Pic
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set likes
     *
     * @param integer $likes
     * @return Pic
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;
    
        return $this;
    }

    /**
     * Get likes
     *
     * @return integer 
     */
    public function getLikes()
    {
        return $this->likes;
    }
}
