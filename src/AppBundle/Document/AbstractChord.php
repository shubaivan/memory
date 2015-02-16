<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class AbstractChord
 * @package AppBundle\Document
 *
 * @ODM\InheritanceType("SINGLE_COLLECTION")
 * @ODM\DiscriminatorField("type")
 * @ODM\HasLifecycleCallbacks()
 * @ODM\MappedSuperclass
 */
class AbstractChord
{
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @ODM\Field(type="string")
     */
    protected $title;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ODM\Field(type="string")
     */
    protected $slug;
}