<?php
namespace AppBundle\Controller;

use AppBundle\Document\AbstractChord;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template as Template;

class ChordController extends Controller
{
    /**
     * Render front page
     *
     * @return Response
     *
     * @Template()
     */
    public function getAllChordsAction()
    {
        $chords = $this->get('doctrine_mongodb.odm.document_manager')
            ->getRepository('AppBundle:AbstractChord')
            ->findAll();

        return [
            'chords' => $chords
        ];
    }

    /**
     * @param AbstractChord $chord
     * @return array
     *
     * @Template()
     */
    public function getSingleChordAction(AbstractChord $chord)
    {
        return [
            "chord" => $chord
        ];
    }
}
