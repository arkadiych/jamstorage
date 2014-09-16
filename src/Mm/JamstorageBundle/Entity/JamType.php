<?php

namespace Mm\JamstorageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * JamType
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Mm\JamstorageBundle\Entity\JamTypeRepository")
 */
class JamType
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
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="JamJar", mappedBy="jamType")
     */
    protected $jamJars;

    public function __construct()
    {
        $this->jamJars = new ArrayCollection();
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
     * @return JamType
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
     * Add jamJars
     *
     * @param \Mm\JamstorageBundle\Entity\JamJar $jamJars
     * @return JamType
     */
    public function addJamJar(\Mm\JamstorageBundle\Entity\JamJar $jamJars)
    {
        $this->jamJars[] = $jamJars;

        return $this;
    }

    /**
     * Remove jamJars
     *
     * @param \Mm\JamstorageBundle\Entity\JamJar $jamJars
     */
    public function removeJamJar(\Mm\JamstorageBundle\Entity\JamJar $jamJars)
    {
        $this->jamJars->removeElement($jamJars);
    }

    /**
     * Get jamJars
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJamJars()
    {
        return $this->jamJars;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
