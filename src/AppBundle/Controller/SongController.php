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
     */
    public function indexAction()
    {
        $songs = $this->get('doctrine_mongodb.odm.document_manager')
            ->getRepository('AppBundle:Song')
            ->findAll();

        return $this->render(
            'AppBundle:Song:showSong.html.twig',
            [
                'songs' => $songs
            ]
        );
    }

    /**
     * Method that addnew song
     *
     * @param Request $request
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

    public function songsInAlbumAction($id)
    {
        $songs = $this->get('doctrine_mongodb.odm.document_manager')
            ->getRepository('AppBundle:Song')
            ->findByAlbum($id);
        if (!$songs) {
            throw $this->createNotFoundException('No posts found');
        }
        return $this->render('AppBundle:Song:showSong.html.twig', array('songs' => $songs));
    }
}