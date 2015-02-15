<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template as Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Document\Video;
use AppBundle\Form\Type\VideoType;

class VideoController extends Controller
{
    /**
     * Method that render all video
     *
     * @return Response
     *
     * @Template()
     */
    public function showVideoAction()
    {
        $videos = $this->get('doctrine_mongodb.odm.document_manager')
                        ->getRepository('AppBundle:Video')
                        ->findAll();

        if (!$videos) {
            throw $this->createNotFoundException('No posts found');
        }

        return [
            'videos' => $videos
        ];
    }

    /**
     * Method that add new video
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     *
     * @Template()
     */
    public function addVideoAction(Request $request)
    {
        $video = new Video();

        $form = $this->createForm(new VideoType(), $video);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->get('doctrine_mongodb.odm.document_manager');

            $em->persist($video);
            $em->flush();

            return $this->redirect($this->generateUrl('app_video_show'));
        }

        return [
            'messages' => $video,
            'form' => $form->createView(),
        ];
    }
}