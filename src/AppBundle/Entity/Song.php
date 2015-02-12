<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class Song
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="song")
 */
class Song
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
    protected $nameSong;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Chord", inversedBy="song")
     * @ORM\JoinColumn(name="chord_id", referencedColumnName="id")
     */
    protected $chord;
    /**
     * @ORM\Column(length=64)
     */
    protected $author;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Album", inversedBy="song")
     * @ORM\JoinColumn(name="album_id", referencedColumnName="id")
     */
    protected $album;

    /**
     * @Gedmo\Slug(fields={"nameSong"}, style="camel")
     * @ORM\Column(length=128, unique=true)
     */
    protected $slug;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Video", mappedBy="song")
     */
    protected $video;

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
     * @ORM\ManyToMany(targetEntity="UserBundle\Entity\User", mappedBy="videos")
     * @ORM\JoinTable(name="videos_users")
     */
    protected $users;

    /**
     * @ORM\OneToMany(targetEntity="Rating", mappedBy="video")
     */
    protected $ratings;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->video = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ratings = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nameSong
     *
     * @param string $nameSong
     * @return Song
     */
    public function setNameSong($nameSong)
    {
        $this->nameSong = $nameSong;

        return $this;
    }

    /**
     * Get nameSong
     *
     * @return string 
     */
    public function getNameSong()
    {
        return $this->nameSong;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Song
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
     * Set slug
     *
     * @param string $slug
     * @return Song
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Song
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
     * @return Song
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
     * @return Song
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
     * @param \AppBundle\Entity\Chord $chord
     * @return Song
     */
    public function setChord(\AppBundle\Entity\Chord $chord = null)
    {
        $this->chord = $chord;

        return $this;
    }

    /**
     * Get chord
     *
     * @return \AppBundle\Entity\Chord 
     */
    public function getChord()
    {
        return $this->chord;
    }

    /**
     * Set album
     *
     * @param \AppBundle\Entity\Album $album
     * @return Song
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

    /**
     * Add video
     *
     * @param \AppBundle\Entity\Video $video
     * @return Song
     */
    public function addVideo(\AppBundle\Entity\Video $video)
    {
        $this->video[] = $video;

        return $this;
    }

    /**
     * Remove video
     *
     * @param \AppBundle\Entity\Video $video
     */
    public function removeVideo(\AppBundle\Entity\Video $video)
    {
        $this->video->removeElement($video);
    }

    /**
     * Get video
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Add users
     *
     * @param \UserBundle\Entity\User $users
     * @return Song
     */
    public function addUser(\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \UserBundle\Entity\User $users
     */
    public function removeUser(\UserBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add ratings
     *
     * @param \AppBundle\Entity\Rating $ratings
     * @return Song
     */
    public function addRating(\AppBundle\Entity\Rating $ratings)
    {
        $this->ratings[] = $ratings;

        return $this;
    }

    /**
     * Remove ratings
     *
     * @param \AppBundle\Entity\Rating $ratings
     */
    public function removeRating(\AppBundle\Entity\Rating $ratings)
    {
        $this->ratings->removeElement($ratings);
    }

    /**
     * Get ratings
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRatings()
    {
        return $this->ratings;
    }
}
