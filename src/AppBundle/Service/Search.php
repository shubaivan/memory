<?php

namespace AppBundle\Service;

use AppBundle\Repository\SongRepository;

class Search
{
    protected $repository;

    public function __construct(SongRepository $repository)
    {
        $this->repository = $repository;
    }

    public function search($string)
    {
        return $this->repository->getIdArrayByName($string);
    }
}