<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Document\Chord;
use Symfony\Component\Yaml\Yaml;

class LoadChordData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        $chords = Yaml::parse(file_get_contents(__DIR__.'/Data/Chord.yml'));

        foreach ($chords as $key => $chordData) {
            $chord = new Chord();
            $chord->setTitle($chordData['title']);

            $this->addReference($key, $chord);

            $manager->persist($chord);
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
