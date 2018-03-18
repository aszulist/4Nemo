<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Room;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;

class RoomFixtures extends Fixture
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * RoomFixtures constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager) {
        $this->em = $entityManager;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $roomsCount = 3;

        $previousRoom = null;
        for ($iterator = 1; $iterator <= $roomsCount; $iterator++) {
            $previousRoom = $this->createRoom($iterator, $previousRoom);
        }
    }

    /**
     * @param int $iterator
     * @param Room $previousRoom
     *
     * @return Room
     */
    private function createRoom(int $iterator, Room $previousRoom = null) {

        $room = new Room();
        $room->setName('Name ' . $iterator);
        $room->setDescription('Description ' . $iterator);
        $room->setMapImagePath('web/img/room_' . $iterator . '.jpg');

        if (!empty($previousRoom)) {
            $room->setPreviousRoom($previousRoom);
        }

        $this->em->persist($room);
        $this->em->flush();
        $this->em->refresh($room);

        return $room;
    }
}