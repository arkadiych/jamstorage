<?php

namespace Mm\JamstorageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Year
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Mm\JamstorageBundle\Entity\YearRepository")
 */
class Year
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=4)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="JamJar", mappedBy="year")
     */
    protected $years;

    public function __construct()
    {
        $this->years = new ArrayCollection();
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
     * @return Year
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
     * Add years
     *
     * @param \Mm\JamstorageBundle\Entity\JamJar $years
     * @return Year
     */
    public function addYear(\Mm\JamstorageBundle\Entity\JamJar $years)
    {
        $this->years[] = $years;

        return $this;
    }

    /**
     * Remove years
     *
     * @param \Mm\JamstorageBundle\Entity\JamJar $years
     */
    public function removeYear(\Mm\JamstorageBundle\Entity\JamJar $years)
    {
        $this->years->removeElement($years);
    }

    /**
     * Get years
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getYears()
    {
        return $this->years;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
