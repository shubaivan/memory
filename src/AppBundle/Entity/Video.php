<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class Video
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="video")
 */
class Video
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\Column(length=64)
     */
    protected $title;
    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Chords", inversedBy="video")
     */
    protected $chord;
    /**
     * @ORM\Column(length=64)
     */
    protected $author;
    /**
     * @ORM\Column(type="integer")
     */
    protected $year;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Album", inversedBy="video")
     */
    protected $album;

    /**
     * @Gedmo\Slug(fields={"title"}, style="camel")
     * @ORM\Column(length=128, unique=true)
     */
    protected $slug;
    /**
     * @ORM\Column(type="text")
     */
    protected $description;
    /**
     * @ORM\Column(type="string")
     */
    protected $link;
    /**
     * @Doctrine\ORM\Mapping\Column(type="datetime", name="created_at")
     * @Gedmo\Timestampable(on="create")
     */
    protected $createdAt;
    /**
     * @Doctrine\ORM\Mapping\Column(type="datetime", name="updated_at")
     * @Gedmo\Timestampable(on="update")
     */
    protected $updatedAt;
    /**
     * @var integer
     * @ORM\Column(type = "integer")
     */
    protected $viewsNumber = 0;

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
     * Set title
     *
     * @param string $title
     * @return Video
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Video
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set year
     *
     * @param integer $year
     * @return Video
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Video
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Video
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Video
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Video
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Video
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set viewsNumber
     *
     * @param integer $viewsNumber
     * @return Video
     */
    public function setViewsNumber($viewsNumber)
    {
        $this->viewsNumber = $viewsNumber;

        return $this;
    }

    /**
     * Get viewsNumber
     *
     * @return integer 
     */
    public function getViewsNumber()
    {
        return $this->viewsNumber;
    }

    /**
     * Set chord
     *
     * @param \AppBundle\Entity\Chords $chord
     * @return Video
     */
    public function setChord(\AppBundle\Entity\Chords $chord = null)
    {
        $this->chord = $chord;

        return $this;
    }

    /**
     * Get chord
     *
     * @return \AppBundle\Entity\Chords 
     */
    public function getChord()
    {
        return $this->chord;
    }

    /**
     * Set album
     *
     * @param \AppBundle\Entity\Album $album
     * @return Video
     */
    public function setAlbum(\AppBundle\Entity\Album $album = null)
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Get album
     *
     * @return \AppBundle\Entity\Album 
     */
    public function getAlbum()
    {
        return $this->album;
    }
}
