<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Video;
use UserBundle\Entity\User;
use AppBundle\Form\Type\VideoType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $songs = $this->getDoctrine()->getRepository('AppBundle:Song')->findAll();

        return $this->render('AppBundle::index.html.twig', array('songs' => $songs));
    }

    public function albumTreeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('AppBundle:Album');
        $options = array(
            'decorate' => true,
            'nodeDecorator' => function ($node) {
                return '<a href="/album/'.$node['id'].'">'.$node['name'].'</a>';
            }
        );
        $htmlTree = $repo->childrenHierarchy(null, false,  $options);

        return new Response($htmlTree);
    }
    public function songsOfCategoryAction($id)
    {
        $songs = $this->getDoctrine()->getRepository('AppBundle:Song')->findByAlbum($id);

        if (!$songs) {
            throw $this->createNotFoundException('No posts found');
        }

        return $this->render('AppBundle::index.html.twig', array('songs' => $songs));
    }

    public function copyVideoToUserAction($user_id, $video_id)
    {
        $user = $this->getUser();
        $video = $this->getDoctrine()->getRepository('AppBundle:Video')
            ->find($video_id);
        $user->addVideo($video);
        $this->getDoctrine()->getManager()->persist($user);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirect($this->generateUrl('app_video_show'));
    }
}
