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
        $videos = $this->getDoctrine()->getRepository('AppBundle:Video')->findAll();

        return $this->render('AppBundle::index.html.twig', array('videos' => $videos));
    }

    public function categoryTreeAction()
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
    public function videosOfCategoryAction($id)
    {
        $videos = $this->getDoctrine()->getRepository('AppBundle:Video')->findByAlbum($id);

        if (!$videos) {
            throw $this->createNotFoundException('No posts found');
        }

        return $this->render('AppBundle::index.html.twig', array('videos'=>$videos));
    }

    public function addVideoAction(Request $request)
    {
        $video = new Video();
        $form = $this->createForm(new VideoType(), $video);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($video);
            $em->flush();

            return $this->redirect($this->generateUrl('app'));
        }

        return $this->render('AppBundle::addVideo.html.twig',
            array('messages' => $video,
                'form' => $form->createView(),
            ));
    }
    public function copyVideoToUserAction($user_id, $video_id)
    {
        $user = $this->getUser();
        $video = $this->getDoctrine()->getRepository('AppBundle:Video')
            ->find($video_id);
        $user->addVideo($video);
        $this->getDoctrine()->getManager()->persist($user);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirect($this->generateUrl('app'));
    }
}
