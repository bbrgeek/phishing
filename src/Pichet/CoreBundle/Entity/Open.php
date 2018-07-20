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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

