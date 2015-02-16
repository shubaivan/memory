<?php

namespace AppBundle\DataFixtures\MongoDB;

use AppBundle\Document\Song;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;

class LoadSongData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $songs = Yaml::parse(file_get_contents(__DIR__.'/Data/Song.yml'));
        foreach ($songs as $key => $songData) {
            $song = new Song();
            $song->setName($songData['name']);
            $song->setTimeline($songData['timeline']);
            $song->addChord($this->getReference($songData['chord']));
            $song->setAlbum($this->getReference($songData['album']));

            $this->addReference($key, $song);

            $manager->persist($song);
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
