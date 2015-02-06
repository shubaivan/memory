<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Album;
use Symfony\Component\Yaml\Yaml;

class LoadAlbumData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        $albums = Yaml::parse(file_get_contents(__DIR__.'/Data/Album.yml'));

        foreach ($albums as $key => $albumData) {
            $album = new Album();
            $album->setYear($albumData['year']);
            $album->setName($albumData['name']);

            $this->addReference($key, $album);

            if (isset($albumData['parent'])) {
                $album->setParent($this->getReference($albumData['parent']));
            }

            $manager->persist($album);
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
