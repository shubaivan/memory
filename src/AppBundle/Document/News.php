<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class News
 * @package AppBundle\Document
 *
 * @ODM\Document
 * @ODM\HasLifecycleCallbacks()
 */
class News
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
     * @ODM\Field(type="string")
     */
    protected $text;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ODM\Field(type="date")
     */
    protected $createdAt;
}