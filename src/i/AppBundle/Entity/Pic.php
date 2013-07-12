<?php

namespace i\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pic
 *
 * @ORM\Table(name="pic")
 * @ORM\Entity
 */
class Pic
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="pic_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="login_id", type="integer", nullable=false)
     */
    private $loginId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="text", nullable=false)
     */
    private $url;

    /**
     * @var integer
     *
     * @ORM\Column(name="likes", type="integer", nullable=false)
     */
    private $likes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;



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

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Pic
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}