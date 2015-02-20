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
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Song")
     */
    protected $song;

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
     * @var string
     *
     * @Gedmo\Slug(fields={"title"})
     * @ODM\Field(type="string")
     */
    protected $slug;

    /**
     * @ODM\Field(type="string")
     */
    protected $chord;

    /**
     * @ODM\ReferenceOne(targetDocument="UserBundle\Document\User")
     */
    protected $author;

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
     * Set chord
     *
     * @param  string $chord
     * @return self
     */
    public function setChord($chord)
    {
        $this->chord = $chord;

        return $this;
    }

    /**
     * Get chord
     *
     * @return string $chord
     */
    public function getChord()
    {
        return $this->chord;
    }

    /**
     * Set song
     *
     * @param  \AppBundle\Document\Song $song
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
     * @return \AppBundle\Document\Song $song
     */
    public function getSong()
    {
        return $this->song;
    }

    /**
     * Set author
     *
     * @param UserBundle\Document\User $author
     * @return self
     */
    public function setAuthor(\UserBundle\Document\User $author)
    {
        $this->author = $author;
        $author->addChord($this);
        return $this;
    }

    /**
     * Get author
     *
     * @return UserBundle\Document\User $author
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
