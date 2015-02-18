<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class
 * @package AppBundle\Document
 *
 * @ODM\Document()
 */
class Video
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
    protected $link;

    /**
     * @ODM\Field(type="int")
     */
    protected $like;

    /**
     * @ODM\Field(type="int")
     */
    protected $dislike;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ODM\Field(type="string")
     */
    protected $slug;

    /**
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Song")
     */
    protected $song;

    /**
     * @ODM\ReferenceOne(targetDocument="UserBundle\Document\User")
     */
    protected $author;

    /**
     * @ODM\ReferenceMany(targetDocument="UserBundle\Document\User")
     */
    protected $users;

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
     * Set link
     *
     * @param  string $link
     * @return self
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string $link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set like
     *
     * @param  int  $like
     * @return self
     */
    public function setLike($like)
    {
        $this->like = $like;

        return $this;
    }

    /**
     * Get like
     *
     * @return int $like
     */
    public function getLike()
    {
        return $this->like;
    }

    /**
     * Set dislike
     *
     * @param  int  $dislike
     * @return self
     */
    public function setDislike($dislike)
    {
        $this->dislike = $dislike;

        return $this;
    }

    /**
     * Get dislike
     *
     * @return int $dislike
     */
    public function getDislike()
    {
        return $this->dislike;
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
     * Set author
     *
     * @param  \UserBundle\Document\User $author
     * @return self
     */
    public function setAuthor(\UserBundle\Document\User $author)
    {
        $this->author = $author;
        $author->addVideo($this);

        return $this;
    }

    /**
     * Get author
     *
     * @return \UserBundle\Document\User $author
     */
    public function getAuthor()
    {
        return $this->author;
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
        $song->addVideo($this);

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
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \UserBundle\Document\User $user
     */
    public function addUser(\UserBundle\Document\User $user)
    {
        $this->users[] = $user;
    }

    /**
     * Remove user
     *
     * @param \UserBundle\Document\User $user
     */
    public function removeUser(\UserBundle\Document\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection $users
     */
    public function getUsers()
    {
        return $this->users;
    }
}
