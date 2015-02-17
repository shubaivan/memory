<?php
namespace AppBundle\Controller;

use AppBundle\Document\News;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template as Template;

class NewsController extends Controller
{
    /**
     * Render front page
     *
     * @return Response
     *
     * @Template(template="AppBundle::index.html.twig")
     */
    public function getAllNewsAction()
    {
        $news = $this->get('doctrine_mongodb.odm.document_manager')
            ->getRepository('AppBundle:News')
            ->findAll();

        return [
            'news' => $news
        ];
    }

    /**
     * @param  News  $news
     * @return array
     *
     * @Template()
     */
    public function getSingleNewsAction(News $news)
    {
        return [
            "news" => $news
        ];
    }
}
