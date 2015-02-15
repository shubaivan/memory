<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Song;
use AppBundle\Form\Type\SongType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template as Template;
use Symfony\Component\HttpFoundation\Request;

class SongController extends Controller
{
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
            $em = $this->getDoctrine()->getManager();

            $em->persist($song);
            $em->flush();

            return $this->redirect($this->generateUrl('app'));
        }

        return [
            'messages' => $song,
            'form' => $form->createView(),
        ];
    }
}