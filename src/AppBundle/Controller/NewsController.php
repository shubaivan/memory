<?php
namespace AppBundle\Controller;

use AppBundle\Document\Song;
use AppBundle\Form\Type\SongType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template as Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{
    /**
     * Render front page
     *
     * @return Response
     */
    public function indexAction()
    {
        $news = $this->get('doctrine_mongodb.odm.document_manager')
            ->getRepository('AppBundle:News')
            ->findAll();

        return $this->render(
            'AppBundle::index.html.twig',
            [
                'news' => $news
            ]
        );
    }
}