<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template as Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Video;
use AppBundle\Form\Type\VideoType;

class VideoController extends Controller
{
    /**
     * @return Response
     *
     * @Template()
     */
    public function showVideoAction()
    {
        $videos = $this->getDoctrine()->getRepository('AppBundle:Video')->findAll();

        if (!$videos) {
            throw $this->createNotFoundException('No posts found');
        }

        return [
            'videos' => $videos
        ];
    }

    /**
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
            $em = $this->getDoctrine()->getManager();

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