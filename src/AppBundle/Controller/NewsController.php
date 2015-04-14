<?php
namespace AppBundle\Controller;

use AppBundle\Document\News;
use AppBundle\Form\Type\NewsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template as Template;
use AppBundle\Form\Type\CommentsType;

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
        $form = $this->createForm(new CommentsType());

        return [
            "news" => $news,
            "form" => $form->createView()
        ];
    }

    /**
     * @param  Request                                                  $request
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @Template()
     */
    public function addNewsAction(Request $request)
    {
        $news = new News();

        $form = $this->createForm(new NewsType(), $news);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $dm = $this->get('doctrine_mongodb.odm.document_manager');
            $news->setAuthor($this->getUser());

            $dm->persist($news);
            $dm->flush();

            return $this->redirect(
                $this->generateUrl('app_get_all_news')
            );
        }

        return [
            "form" => $form->createView()
        ];
    }
}
