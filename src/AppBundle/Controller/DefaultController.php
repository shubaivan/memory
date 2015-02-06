<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $videos = $this->getDoctrine()->getRepository('AppBundle:Video')->findAll();

        return $this->render('AppBundle::index.html.twig', array('videos' => $videos));
    }

    public function categoryTreeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('AppBundle:Album');
        $options = array(
            'decorate' => true,
            'nodeDecorator' => function($node) {
                return '<a href="/album/'.$node['id'].'">'.$node['name'].'</a>';
            }
        );
        $htmlTree = $repo->childrenHierarchy(null, false,  $options);
        return new Response($htmlTree);
    }
    public function videosOfCategoryAction($id)
    {
        $videos = $this->getDoctrine()->getRepository('AppBundle:Video')->findByCategory($id);

        if (!$videos) {
            throw $this->createNotFoundException('No posts found');
        }
        return $this->render('AppBundle::index.html.twig', array('videos'=>$videos));
    }
}
