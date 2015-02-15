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
     * @Gedmo\Slug(fields={"name"})
     * @ODM\Field(type="string")
     */
    protected $slug;
}