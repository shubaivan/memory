<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class Chord
 * @package AppBundle\Document
 *
 * @ODM\Document()
 */
class Chord extends AbstractChord
{
    /**
     * @ODM\File()
     */
    protected $gtp;
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @var string $title
     */
    protected $title;

    /**
     * @var string $slug
     */
    protected $slug;


    /**
     * Set gtp
     *
     * @param file $gtp
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
     * @param string $title
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
}
