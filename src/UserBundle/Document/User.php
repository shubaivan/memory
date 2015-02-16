<?php

namespace UserBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Class User
 * @package UserBundle\Document
 *
 * @ODM\Document()
 */
class User extends BaseUser
{
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @ODM\Field(type="string")
     */
    protected $firstName;

    /**
     * @ODM\Field(type="string")
     */
    protected $secondName;

    /**
     * @Gedmo\Slug(fields={"firstName", "secondName"})
     * @ODM\Field(type="string")
     */
    protected $slug;

    /**
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Video")
     */
    protected $video;
    public function __construct()
    {
        $this->video = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set firstName
     *
     * @param string $firstName
     * @return self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string $firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set secondName
     *
     * @param string $secondName
     * @return self
     */
    public function setSecondName($secondName)
    {
        $this->secondName = $secondName;
        return $this;
    }

    /**
     * Get secondName
     *
     * @return string $secondName
     */
    public function getSecondName()
    {
        return $this->secondName;
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
     * Add video
     *
     * @param AppBundle\Document\Video $video
     */
    public function addVideo(\AppBundle\Document\Video $video)
    {
        $this->video[] = $video;
    }

    /**
     * Remove video
     *
     * @param AppBundle\Document\Video $video
     */
    public function removeVideo(\AppBundle\Document\Video $video)
    {
        $this->video->removeElement($video);
    }

    /**
     * Get video
     *
     * @return Doctrine\Common\Collections\Collection $video
     */
    public function getVideo()
    {
        return $this->video;
    }
}