<?php

namespace AppBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Document\News;
use Symfony\Component\Yaml\Yaml;

class LoadNewsData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        $news = Yaml::parse(file_get_contents(__DIR__.'/Data/News.yml'));

        foreach ($news as $key => $newData) {
            $new = new News();
            $new->setTitle($newData['title']);
            $new->setText($newData['text']);

            $this->addReference($key, $new);

            $manager->persist($new);
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
