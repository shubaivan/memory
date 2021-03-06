<?php
namespace AppBundle\Controller;

use AppBundle\Document\AbstractChord;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template as Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security as Security;
use AppBundle\Document\Chord;
use AppBundle\Form\Type\ChordType;
use AppBundle\Document\Song;

class ChordController extends Controller
{
    /**
     * Method that render all chord
     *
     * @param  Song     $song
     * @return Response
     *
     * @Template()
     */
    public function getAllChordsAction(Song $song)
    {
        return [
            'song' => $song
        ];
    }

    /**
     * @param  Chord $chord
     * @return array
     *
     * @Template()
     */
    public function getSingleChordAction($slug)
    {
        $chord = $this->get('doctrine_mongodb.odm.document_manager')
                    ->getRepository('AppBundle:AbstractChord')
                    ->findOneBy(["slug" => $slug]);

        return [
            "chord" => $chord
        ];
    }

    /**
     * Method that add new chord
     *
     * @param  Request                                                     $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     *
     * @Security("has_role('ROLE_USER')")
     * @Template()
     */
    public function addChordAction(Request $request, Song $song)
    {
        $chord = new Chord();

        $form = $this->createForm(new ChordType(), $chord);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $dm = $this->get('doctrine_mongodb.odm.document_manager');
            $chord->setAuthor($this->getUser());
            $chord->setSong($song);

            $dm->persist($chord);
            $dm->flush();

            return $this->redirect($this->generateUrl(
                    'app_get_all_chords_in_song',
                    [
                        'slugAlbum' => $song->getAlbum()->getSlug(),
                        'slug' => $song->getSlug()
                    ]
                )
            );
        }

        return [
            'messages' => $chord,
            'form' => $form->createView(),
        ];
    }
}
