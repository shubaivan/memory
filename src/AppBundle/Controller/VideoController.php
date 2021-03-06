<?php

namespace AppBundle\Controller;

use AppBundle\Document\Song;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template as Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security as Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Document\Video;
use AppBundle\Form\Type\VideoType;
use AppBundle\Form\Type\CommentsType;

class VideoController extends Controller
{
    /**
     * Method that render all video
     *
     * @param  Song     $song
     * @return Response
     *
     * @Template()
     */
    public function getAllVideosAction(Song $song)
    {
        return [
            'song' => $song
        ];
    }

    /**
     * Method that render all video
     *
     * @param
     * @return Response
     *
     * @Template()
     */
    public function getListVideosAction()
    {
        $video = $this->get('doctrine_mongodb.odm.document_manager')->getRepository('AppBundle:Video')->findAll();

        return [
            'video' => $video
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
        $form = $this->createForm(new CommentsType());

        return [
            "video" => $video,
            "form" => $form->createView()
        ];
    }

    /**
     * Method that add new video
     *
     * @param  Request                                                     $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     *
     * @Security("has_role('ROLE_USER')")
     * @Template()
     */
    public function addVideoAction(Request $request, Song $song)
    {
        $video = new Video();

        $form = $this->createForm(new VideoType(), $video);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $dm = $this->get('doctrine_mongodb.odm.document_manager');
            $this->get('add_video.service')->addVideo($video, $song);
            $video->setAuthor($this->getUser());
            $dm->persist($video);
            $dm->flush();

            return $this->redirect($this->generateUrl(
                    'app_get_all_videos_in_song',
                    [
                        'slugAlbum' => $song->getAlbum()->getSlug(),
                        'slug' => $song->getSlug()
                    ]
                )
            );
        }

        return [
            'messages' => $video,
            'form' => $form->createView(),
        ];
    }

    public function copyVideoToUserAction($user_id, $video_id)
    {
//        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $video = $this->get('doctrine_mongodb.odm.document_manager')
            ->getRepository('AppBundle:Video')
            ->find($video_id);

        $user->addVideo($video);

        $dm = $this->get('doctrine.odm.mongodb.document_manager');
                $dm->persist($user);
                $dm->flush();

        return $this->redirect($this->generateUrl('app_get_all_videos'));
    }
}
