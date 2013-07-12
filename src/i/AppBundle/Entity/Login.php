<?php

namespace i\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Login
 *
 * @ORM\Table(name="login")
 * @ORM\Entity
 */
class Login implements UserInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="login_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=false)
     */
    private $salt;

    /**
     * @var integer
     *
     * @ORM\Column(name="pics", type="integer", nullable=false)
     */
    private $pics;

    /**
     * @var integer
     *
     * @ORM\Column(name="facebook_id", type="bigint", nullable=true)
     */
    private $facebookId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;


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

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Login
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
