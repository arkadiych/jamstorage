<?php

namespace Mm\JamstorageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * JamJar
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Mm\JamstorageBundle\Entity\JamJarRepository")
 */
class JamJar
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
     * @ORM\Column(name="comment", type="string", length=140, nullable=true)
     * @Assert\Length(max=140)
     */
    private $comment;

    /**
     * @ORM\ManyToOne(targetEntity="JamType", inversedBy="jamJars")
     * @ORM\JoinColumn(name="jam_type_id", referencedColumnName="id")
     */
    protected $jamType;

    /**
     * @ORM\ManyToOne(targetEntity="Year", inversedBy="jamJars")
     * @ORM\JoinColumn(name="year_id", referencedColumnName="id")
     */
    protected $year;

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
     * Set comment
     *
     * @param string $comment
     * @return JamJar
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set jamType
     *
     * @param \Mm\JamstorageBundle\Entity\JamType $jamType
     * @return JamJar
     */
    public function setJamType(\Mm\JamstorageBundle\Entity\JamType $jamType = null)
    {
        $this->jamType = $jamType;

        return $this;
    }

    /**
     * Get jamType
     *
     * @return \Mm\JamstorageBundle\Entity\JamType 
     */
    public function getJamType()
    {
        return $this->jamType;
    }

    /**
     * Set year
     *
     * @param \Mm\JamstorageBundle\Entity\Year $year
     * @return JamJar
     */
    public function setYear(\Mm\JamstorageBundle\Entity\Year $year = null)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return \Mm\JamstorageBundle\Entity\Year 
     */
    public function getYear()
    {
        return $this->year;
    }
}
