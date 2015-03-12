<?php

namespace AppBundle\Service;

use AppBundle\Document\Video;
use Doctrine\ODM\MongoDB\DocumentManager;
use AppBundle\Document\Song;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AddVideoService extends Controller
{

    private $dm;

    public function __construct(DocumentManager $dm)
    {
        $this->dm = $dm;
    }

    /**
     * @param Video $video
     * @param Song  $song
     * @Security("has_role('ROLE_USER')")
     */
    public function addVideo(Video $video, Song $song)
    {
        $url = $video->getLink();
        $parsed_url = parse_url($url);
        parse_str($parsed_url['query'], $parsed_query);
        $newlink = '<iframe src="http://www.youtube.com/embed/' . $parsed_query['v'] . '" type="text/html" width="400" height="300" frameborder="0"></iframe>';
        $video->setLink($newlink);
        $json = json_decode(file_get_contents("http://gdata.youtube.com/feeds/api/videos/".$parsed_query['v'] ."?v=2&alt=jsonc"));

//        $video->setAuthor($this->getUser());
        $video->setSong($song);
        $this->dm->persist($video);

        $this->dm->flush();

    }
}
