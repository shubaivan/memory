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
    public function getAllVideosAction()
    {
        if($this->getUser() and $this->get('session')->get('user_menu') == true){
            $videos = $this->getUser()->getVideos();
        }
        else
        {
            $videos = $this->get('doctrine_mongodb.odm.document_manager')
                ->getRepository('AppBundle:Video')
                ->findAll();
        }
        return [
            'videos' => $videos
        ];

    }

    /**
     * @param  Video $video
     * @return array
     *
     * @Template()
     */
    public function getSingleVideoAction(Video $video)
    {
        return [
            "video" => $video
        ];
    }

    /**
     * Method that add new video
     *
     * @param  Request                                                     $request
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

            return $this->redirect($this->generateUrl('app_get_all_videos'));
        }

        return [
            'messages' => $video,
            'form' => $form->createView(),
        ];
    }

    public function copyVideoToUserAction($user_id, $video_id)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $video = $this->get('doctrine_mongodb.odm.document_manager')
            ->getRepository('AppBundle:Video')
            ->find($video_id);

        $user->addVideo($video);

        $em->persist($user);
        $em->getManager()->flush();

        return $this->redirect($this->generateUrl('app_video_show'));
    }
}
