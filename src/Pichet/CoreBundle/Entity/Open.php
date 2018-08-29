<?php

namespace Pichet\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Open
 *
 * @ORM\Table(name="open")
 * @ORM\Entity(repositoryClass="Pichet\CoreBundle\Repository\OpenRepository")
 */
class Open
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $token
     * @ORM\Column(name="token", type="string", length=255, unique=true)
     */
    protected $token;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

}

