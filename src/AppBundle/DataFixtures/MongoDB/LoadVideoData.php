<?php

namespace AppBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Document\Video;
use Symfony\Component\Yaml\Yaml;

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
            $video->setName($videoData['name']);
            $video->setLink($videoData['link']);
            $video->setLike($videoData['like']);
            $video->setDislike($videoData['dislike']);

            $this->addReference($key, $video);

            $manager->persist($video);
        }
        $manager->flush();
    }
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4; // the order in which fixtures will be loaded
    }
}
