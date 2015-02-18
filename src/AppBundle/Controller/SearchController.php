<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Document\Song;

class SearchController extends Controller
{
    public function searchAction(Request $request)
    {
        $searcher = $this->get('searcher');
        $result = $searcher->search($request->get('search'));
        $repository = $this->get('doctrine_mongodb')->getRepository('AppBundle:Song');
        $query = $repository->createQueryBuilder('m')
            ->where('m.id IN (:ids)')
            ->setParameter('ids', $result)
            ->getQuery();
        $song = $query->getResult();

        if (!$song) {
            throw $this->createNotFoundException('Opss, dont search');
        }

        return $this->render('AppBundle::serchSong.html.twig', array('song' => $song));
    }

}
