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
class Comments
{
    use Timestampable;
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\News")
     */
    protected $news;

    /**
     * @ODM\Field(type="string")
     */
    protected $text;

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
     * Set author
     *
     * @param \UserBundle\Document\User $author
     * @return self
     */
    public function setAuthor(\UserBundle\Document\User $author)
    {
        $this->author = $author;
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
     * Set news
     *
     * @param \AppBundle\Document\News $news
     * @return self
     */
    public function setNews(\AppBundle\Document\News $news)
    {
        $this->news = $news;
        $news->addComment($this);
        return $this;
    }

    /**
     * Get news
     *
     * @return \AppBundle\Document\News $news
     */
    public function getNews()
    {
        return $this->news;
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
}
