<?php
namespace AppBundle\Controller;

use AppBundle\Document\Album;
use AppBundle\Form\Type\AlbumType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template as Template;

class AlbumController extends Controller
{
    /**
     * Render front page
     *
     * @return Response
     *
     * @Template()
     */
    public function getAllAlbumAction()
    {
        $albums = $this->get('doctrine_mongodb.odm.document_manager')
            ->getRepository('AppBundle:Album')
            ->findAll();

        return [
            'albums' => $albums
        ];
    }

    /**
     * @param  Album $album
     * @return array
     *
     * @Template()
     */
    public function getSingleAlbumAction(Album $album)
    {
        return [
            "album" => $album
        ];
    }

    /**
     * @param  Request                                                  $request
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @Template()
     */
    public function addNewAlbumAction(Request $request)
    {
        $song = new Album();

        $dm = $this->get('doctrine_mongodb.odm.document_manager');

        $form = $this->createForm(new AlbumType(), $song);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $dm->persist($song);
            $dm->flush();

            return $this->redirect(
                $this->generateUrl('app_get_all_albums')
            );
        }

        return [
            "form" => $form->createView(),
        ];
    }
}
