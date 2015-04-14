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
    protected $avatar;

    /**
     * @ODM\Field(type="string")
     */
    protected $firstName;

    /**
     * @ODM\Field(type="string")
     */
    protected $secondName;

    /**
     * @ODM\Field(type="string")
     */
    protected $facebookId;

    /**
     * @ODM\Field(type="string")
     */
    protected $facebookAccessToken;

    /**
     * @ODM\Field(type="int")
     */
    protected $vkontakteId;

    /**
     * @ODM\Field(type="string")
     */
    protected $vkontakteAccessToken;

    /**
     * @Gedmo\Slug(fields={"firstName", "secondName"})
     * @ODM\Field(type="string")
     */
    protected $slug;

    /**
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Video")
     */
    protected $video;

    /**
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Chord")
     */
    protected $chord;

    /**
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Comments")
     */
    protected $comments;

    /**
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Video")
     */
    protected $favouriteVideo;

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
     * @param  string $firstName
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
     * @param  string $secondName
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
     * Set facebookId
     *
     * @param  int  $facebookId
     * @return self
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    /**
     * Get facebookId
     *
     * @return int $facebookId
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * Set facebookAccessToken
     *
     * @param  string $facebookAccessToken
     * @return self
     */
    public function setFacebookAccessToken($facebookAccessToken)
    {
        $this->facebookAccessToken = $facebookAccessToken;

        return $this;
    }

    /**
     * Get facebookAccessToken
     *
     * @return string $facebookAccessToken
     */
    public function getFacebookAccessToken()
    {
        return $this->facebookAccessToken;
    }

    /**
     * Set vkontakteId
     *
     * @param  int  $vkontakteId
     * @return self
     */
    public function setVkontakteId($vkontakteId)
    {
        $this->vkontakteId = $vkontakteId;

        return $this;
    }

    /**
     * Get vkontakteId
     *
     * @return int $vkontakteId
     */
    public function getVkontakteId()
    {
        return $this->vkontakteId;
    }

    /**
     * Set vkontakteAccessToken
     *
     * @param  string $vkontakteAccessToken
     * @return self
     */
    public function setVkontakteAccessToken($vkontakteAccessToken)
    {
        $this->vkontakteAccessToken = $vkontakteAccessToken;

        return $this;
    }

    /**
     * Get vkontakteAccessToken
     *
     * @return string $vkontakteAccessToken
     */
    public function getVkontakteAccessToken()
    {
        return $this->vkontakteAccessToken;
    }

    public function isFakeEmail()
    {
        return false === strpos($this->email, '@example.com') && $this->email ? false : true;
    }

    public function isFakeUsername()
    {
        return (($this->username == $this->vkontakteId) || ($this->username == $this->facebookId));
    }

    /**
     * Set avatar
     *
     * @param  string $avatar
     * @return self
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string $avatar
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Add favouriteVideo
     *
     * @param \AppBundle\Document\Video $favouriteVideo
     */
    public function addFavouriteVideo(\AppBundle\Document\Video $favouriteVideo)
    {
        $this->favouriteVideo[] = $favouriteVideo;
    }

    /**
     * Remove favouriteVideo
     *
     * @param \AppBundle\Document\Video $favouriteVideo
     */
    public function removeFavouriteVideo(\AppBundle\Document\Video $favouriteVideo)
    {
        $this->favouriteVideo->removeElement($favouriteVideo);
    }

    /**
     * Get favouriteVideo
     *
     * @return \Doctrine\Common\Collections\Collection $favouriteVideo
     */
    public function getFavouriteVideo()
    {
        return $this->favouriteVideo;
    }

    /**
     * Add chord
     *
     * @param \AppBundle\Document\Chord $chord
     */
    public function addChord(\AppBundle\Document\Chord $chord)
    {
        $this->chord[] = $chord;
    }

    /**
     * Remove chord
     *
     * @param \AppBundle\Document\Chord $chord
     */
    public function removeChord(\AppBundle\Document\Chord $chord)
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
     * Add comment
     *
     * @param \AppBundle\Document\Comments $comment
     */
    public function addComment(\AppBundle\Document\Comments $comment)
    {
        $this->comments[] = $comment;
    }

    /**
     * Remove comment
     *
     * @param \AppBundle\Document\Comments $comment
     */
    public function removeComment(\AppBundle\Document\Comments $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection $comments
     */
    public function getComments()
    {
        return $this->comments;
    }
}
