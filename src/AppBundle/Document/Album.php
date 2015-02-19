<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class Album
 * @package AppBundle\Document
 *
 * @ODM\Document()
 */
class Album
{
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @ODM\Field(type="int")
     */
    protected $year;

    /**
     * @ODM\Field(type="string")
     */
    protected $name;

    /**
     * @ODM\File()
     */
    protected $poster;

    /**
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Song")
     */
    protected $song;

    /**
     * @ODM\Field(type="string")
     */
    protected $text;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ODM\Field(type="string")
     */
    protected $slug;

    public function __construct()
    {
        $this->song = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set year
     *
     * @param  int  $year
     * @return self
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return int $year
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set name
     *
     * @param  string $name
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
     * Set poster
     *
     * @param  file $poster
     * @return self
     */
    public function setPoster($poster)
    {
        $this->poster = $poster;

        return $this;
    }

    /**
     * Get poster
     *
     * @return file $poster
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * Add song
     *
     * @param \AppBundle\Document\Song $song
     */
    public function addSong(\AppBundle\Document\Song $song)
    {
        $this->song[] = $song;
    }

    /**
     * Remove song
     *
     * @param \AppBundle\Document\Song $song
     */
    public function removeSong(\AppBundle\Document\Song $song)
    {
        $this->song->removeElement($song);
    }

    /**
     * Get song
     *
     * @return \Doctrine\Common\Collections\Collection $song
     */
    public function getSong()
    {
        return $this->song;
    }

    /**
     * Set slug
     *
     * @param  string $slug
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
     * Set text
     *
     * @param string $text
     * @return self
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Get text
     *
     * @return string $text
     */
    public function getText()
    {
        return $this->text;
    }

    public function __toString()
    {
        return $this->name;
    }
}
