<?php

namespace AppBundle\Controller;

use AppBundle\Document\Comments;
use AppBundle\Document\News;
use AppBundle\Form\Type\CommentsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template as Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentsController extends Controller
{
    /**
     * Method that addnew comment
     *
     * @param  Request                                                                                       $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @Template()
     */
    public function addCommentsAction(Request $request, News $news)
    {
        $comments = new Comments();

        $form = $this->createForm(new CommentsType(), $comments);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $dm = $this->get('doctrine_mongodb.odm.document_manager');
            $comments->setNews($news);

            $dm->persist($comments);
            $dm->flush();

            return $this->redirect(
                $this->generateUrl('app_get_single_news',
                    [
                        "slug" => $news->getSlug()
                    ]
                )
            );
        }

        return [
            'messages' => $comments,
            'form' => $form->createView(),
        ];
    }
}
