<?php

namespace AppBundle\Service;

use AppBundle\Document\Video;
use Doctrine\ODM\MongoDB\DocumentManager;
use AppBundle\Document\Song;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AddVideoService extends Controller
{

    private $dm;

    public function __construct(DocumentManager $dm)
    {
        $this->dm = $dm;
    }

    public function addVideo(Video $video, Song $song)
    {
        $url = $video->getLink();
        $parsed_url = parse_url($url);
        parse_str($parsed_url['query'], $parsed_query);
        $newlink = '<iframe src="http://www.youtube.com/embed/' . $parsed_query['v'] . '" type="text/html" width="400" height="300" frameborder="0"></iframe>';

        $video->setLink($newlink);
        $video->setSong($song);
        $this->dm->persist($video);
    }
}
