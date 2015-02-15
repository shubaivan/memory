<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class Chord
 * @package AppBundle\Document
 *
 * @ODM\Document()
 */
class Chord extends AbstractChord
{
    /**
     * @ODM\File()
     */
    protected $gtp;
}