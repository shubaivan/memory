<?php

namespace AppBundle\Controller;

use AppBundle\Document\Song;
use AppBundle\Form\Type\SongType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template as Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SongController extends Controller
{
    /**
     * Render front page
     *
     * @return Response
     *
     * @Template()
     */
    public function getAllSongAction()
    {
        $songs = $this->get('doctrine_mongodb.odm.document_manager')
            ->getRepository('AppBundle:Song')
            ->findAll();

        return [
            'songs' => $songs
        ];
    }

    /**
     * @param  Song  $song
     * @return array
     *
     * @Template()
     */
    public function getSingleSongAction(Song $song)
    {
        return [
            "song" => $song
        ];
    }

    /**
     * Method that addnew song
     *
     * @param  Request                                                                                       $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @Template()
     */
    public function addSongAction(Request $request)
    {
        $song = new Song();

        $form = $this->createForm(new SongType(), $song);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $dm = $this->get('doctrine_mongodb.odm.document_manager');

            $dm->persist($song);
            $dm->flush();

            return $this->redirect($this->generateUrl('app'));
        }

        return [
            'messages' => $song,
            'form' => $form->createView(),
        ];
    }
}
