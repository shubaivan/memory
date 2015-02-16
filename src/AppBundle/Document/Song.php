<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class Song
 * @package AppBundle\Document
 *
 * @ODM\Document()
 */
class Song
{
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @ODM\Field(type="string")
     */
    protected $name;

    /**
     * @ODM\Field(type="string")
     */
    protected $timeline;

    /**
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Video")
     */
    protected $video;

    /**
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Album")
     */
    protected $album;

    /**
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\AbstractChord")
     */
    protected $chord;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ODM\Field(type="string")
     */
    protected $slug;
    public function __construct()
    {
        $this->video = new \Doctrine\Common\Collections\ArrayCollection();
        $this->chord = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set timeline
     *
     * @param string $timeline
     * @return self
     */
    public function setTimeline($timeline)
    {
        $this->timeline = $timeline;
        return $this;
    }

    /**
     * Get timeline
     *
     * @return string $timeline
     */
    public function getTimeline()
    {
        return $this->timeline;
    }

    /**
     * Add video
     *
     * @param \AppBundle\Document\Video $video
     */
    public function addVideo(\AppBundle\Document\Video $video)
    {
        $this->video[] = $video;
    }

    /**
     * Remove video
     *
     * @param \AppBundle\Document\Video $video
     */
    public function removeVideo(\AppBundle\Document\Video $video)
    {
        $this->video->removeElement($video);
    }

    /**
     * Get video
     *
     * @return \Doctrine\Common\Collections\Collection $video
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Add chord
     *
     * @param \AppBundle\Document\AbstractChord $chord
     */
    public function addChord(\AppBundle\Document\AbstractChord $chord)
    {
        $this->chord[] = $chord;
    }

    /**
     * Remove chord
     *
     * @param \AppBundle\Document\AbstractChord $chord
     */
    public function removeChord(\AppBundle\Document\AbstractChord $chord)
    {
        $this->chord->removeElement($chord);
    }

    /**
     * Get chord
     *
     * @return \Doctrine\Common\Collections\Collection $chord
     */
    public function getChord()
    {
        return $this->chord;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return self
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Get slug
     *
     * @return string $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set album
     *
     * @param \AppBundle\Document\Album $album
     * @return self
     */
    public function setAlbum(\AppBundle\Document\Album $album)
    {
        $this->album = $album;
        return $this;
    }

    /**
     * Get album
     *
     * @return \AppBundle\Document\Album $album
     */
    public function getAlbum()
    {
        return $this->album;
    }
}
