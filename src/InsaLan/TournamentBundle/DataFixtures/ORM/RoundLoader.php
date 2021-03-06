<?php
namespace InsaLan\TournamentBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use InsaLan\TournamentBundle\Entity\Round;

class RoundLoader extends AbstractFixture implements OrderedFixtureInterface
{
    public function getOrder()
    {
        return 7;
    }

    public function load(ObjectManager $manager)
    {
        
        for($i = 1; $i < 4; $i++)
        {
            $e = new Round();
            $e->setMatch($this->getReference('match-'.$i));
            $e->setScore1(mt_rand(0, 1));
            $e->setScore2(1 - $e->getScore1());
            $manager->persist($e);
        }

        $manager->flush();
    }
}
