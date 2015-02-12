<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Video;
use UserBundle\Entity\User;
use AppBundle\Form\Type\VideoType;

class VideoController extends Controller
{
    public function showVideoAction()
    {
        $videos = $this->getDoctrine()->getRepository('AppBundle:Video')->findAll();

        if (!$videos) {
            throw $this->createNotFoundException('No posts found');
        }

        return $this->render('AppBundle:Video:showVideo.html.twig', array('videos' => $videos));
    }
}