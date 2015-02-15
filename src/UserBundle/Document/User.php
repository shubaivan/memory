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
}