<?php
namespace AppBundle\Controller;

use AppBundle\Document\Album;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
}
