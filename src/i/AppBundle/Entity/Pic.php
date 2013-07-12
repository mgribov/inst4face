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


}
