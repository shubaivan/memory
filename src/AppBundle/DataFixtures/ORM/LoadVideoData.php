<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Video;
use Symfony\Component\Yaml\Yaml;
use AppBundle\Entity\Album;
use AppBundle\Entity\Chord;

class LoadVideoData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $videos = Yaml::parse(file_get_contents(__DIR__.'/Data/Video.yml'));
        foreach ($videos as $key => $videoData) {
            $video = new Video();
            $video->setTitle($videoData['title']);
            $video->setAlbum($this->getReference($videoData['album']));
            $video->setChord($this->getReference($videoData['chord']));
            $video->setAuthor($videoData['author']);
            $video->setYear($videoData['year']);
            $video->setDescription($videoData['description']);
            $video->setLink($videoData['link']);
            $manager->persist($video);
        }
        $manager->flush();
    }
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}