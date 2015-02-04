<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $videos = $this->getDoctrine()->getRepository('AppBundle:Video')->findAll();
        return $this->render('AppBundle::index.html.twig', array('videos' => $videos));
    }
}
