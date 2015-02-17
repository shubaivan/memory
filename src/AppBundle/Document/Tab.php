<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class Tab
 * @package AppBundle\Document
 *
 * @ODM\Document()
 */
class Tab extends AbstractChord
{

    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @var string
     *
     * @ODM\Field(type="string")
     * @var string $title
     */
    protected $title;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ODM\Field(type="string")
     */
    protected $slug;

    /**
     * @ODM\File()
     */
    protected $gtp;

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
     * Set title
     *
     * @param  string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
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
     * @var AppBundle\Document\Song
     */
    protected $song;

    /**
     * Set gtp
     *
     * @param  file $gtp
     * @return self
     */
    public function setGtp($gtp)
    {
        $this->gtp = $gtp;

        return $this;
    }

    /**
     * Get gtp
     *
     * @return file $gtp
     */
    public function getGtp()
    {
        return $this->gtp;
    }

    /**
     * Set song
     *
     * @param  AppBundle\Document\Song $song
     * @return self
     */
    public function setSong(\AppBundle\Document\Song $song)
    {
        $this->song = $song;
        $song->addChord($this);

        return $this;
    }

    /**
     * Get song
     *
     * @return AppBundle\Document\Song $song
     */
    public function getSong()
    {
        return $this->song;
    }
}
