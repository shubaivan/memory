<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="chord")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ChordRepository")
 */
class Chord
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $chord;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Song", mappedBy="chord")
     */
    protected $song;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->song = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set chord
     *
     * @param string $chord
     * @return Chord
     */
    public function setChord($chord)
    {
        $this->chord = $chord;

        return $this;
    }

    /**
     * Get chord
     *
     * @return string 
     */
    public function getChord()
    {
        return $this->chord;
    }

    /**
     * Add song
     *
     * @param \AppBundle\Entity\Song $song
     * @return Chord
     */
    public function addSong(\AppBundle\Entity\Song $song)
    {
        $this->song[] = $song;

        return $this;
    }

    /**
     * Remove song
     *
     * @param \AppBundle\Entity\Song $song
     */
    public function removeSong(\AppBundle\Entity\Song $song)
    {
        $this->song->removeElement($song);
    }

    /**
     * Get song
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSong()
    {
        return $this->song;
    }
}
