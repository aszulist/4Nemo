<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Activity;
use AppBundle\Entity\Room;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;

class ActivityFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * ActivityFixtures constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager) {
        $this->em = $entityManager;
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    function getDependencies() {
        return [
            RoomFixtures::class
        ];
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager) {
        $rooms = $this->em->getRepository(Room::class)->findAll();

        $activitiesPerRoom = 3;
        foreach ($rooms as $room) {

            $previousActivity = null;
            for ($iterator = 1; $iterator <= $activitiesPerRoom; $iterator++) {
                $previousActivity = $this->createActivity($room, $iterator, $previousActivity);
            }
        }
    }

    /**
     * @param Room $room
     * @param int $iterator
     * @param Activity $previousActivity
     *
     * @return Activity
     */
    private function createActivity(Room $room, int $iterator, Activity $previousActivity = null) {

        $activity = new Activity();
        $activity->setRoom($room);
        $activity->setName("Name " . $room->getId() . '_' . $iterator);
        $activity->setDescription("Description " . $room->getId() . '_' . $iterator);
        $activity->setMapImagePath('img/activity_' . $room->getId() . '_' . $iterator . '.jpg');

        if (!empty($previousActivity)) {
            $activity->setPreviousActivity($previousActivity);
        }

        $this->em->persist($activity);
        $this->em->flush();
        $this->em->refresh($activity);

        return $activity;
    }
}