<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AlbumController extends Controller
{
    /**
     * Render front page
     *
     * @return Response
     */
    public function indexAction()
    {
        $albums = $this->get('doctrine_mongodb.odm.document_manager')
            ->getRepository('AppBundle:Album')
            ->findAll();

        return $this->render(
            'AppBundle:Album:showAlbum.html.twig',
            [
                'albums' => $albums
            ]
        );
    }
}
