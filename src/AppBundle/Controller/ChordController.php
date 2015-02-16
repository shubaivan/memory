<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ChordController extends Controller
{
    /**
     * Render front page
     *
     * @return Response
     */
    public function indexAction()
    {
        $chords = $this->get('doctrine_mongodb.odm.document_manager')
            ->getRepository('AppBundle:Chord')
            ->findAll();

        return $this->render(
            'AppBundle:Chord:showChord.html.twig',
            [
                'chords' => $chords
            ]
        );
    }
}
