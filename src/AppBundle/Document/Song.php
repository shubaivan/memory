<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class Song
 * @package AppBundle\Document
 *
 * @ODM\Document()
 */
class Song
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
    protected $timeline;

    /**
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Video")
     */
    protected $video;

    /**
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\AbstractChord")
     */
    protected $chord;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ODM\Field(type="string")
     */
    protected $slug;
}