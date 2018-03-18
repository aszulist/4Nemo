<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Room
 *
 * @ORM\Table(name="room")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoomRepository")
 */
class Room
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="map_image_path", type="string", length=255, nullable=true)
     */
    private $mapImagePath;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Activity", mappedBy="room")
     */
    private $activities;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Room", inversedBy="nextRoom")
     * @ORM\JoinColumn(name="previous_room_id", referencedColumnName="id")
     *
     */
    private $previousRoom;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Room", mappedBy="previousRoom")
     */
    private $nextRoom;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Room
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Room
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set mapImagePath
     *
     * @param string $mapImagePath
     *
     * @return Room
     */
    public function setMapImagePath($mapImagePath)
    {
        $this->mapImagePath = $mapImagePath;

        return $this;
    }

    /**
     * Get mapImagePath
     *
     * @return string
     */
    public function getMapImagePath()
    {
        return $this->mapImagePath;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->activities = new ArrayCollection();
    }

    /**
     * Add activity
     *
     * @param Activity $activity
     *
     * @return Room
     */
    public function addActivity(Activity $activity)
    {
        $this->activities[] = $activity;

        return $this;
    }

    public function getFirstActivity()
    {
        $first = null;
        /** @var Activity $activity */
        foreach ($this->activities as $activity) {
            if ($activity->isFirstActivity()) {
                return $activity;
            }
        }
        return null;
    }

    /**
     * Remove activity
     *
     * @param Activity $activity
     */
    public function removeActivity($activity)
    {
        $this->activities->removeElement($activity);
    }

    /**
     * Get activities
     *
     * @return Collection
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * @return mixed
     */
    public function getPreviousRoom()
    {
        return $this->previousRoom;
    }

    /**
     * @param mixed $previousRoom
     */
    public function setPreviousRoom($previousRoom)
    {
        $this->previousRoom = $previousRoom;
    }

    /**
     * @return mixed
     */
    public function getNextRoom()
    {
        return $this->nextRoom;
    }

    /**
     * @param mixed $nextRoom
     */
    public function setNextRoom($nextRoom)
    {
        $this->nextRoom = $nextRoom;
    }

    /**
     * @return bool
     */
    public function isFirstRoom()
    {
        return empty($this->previousRoom);
    }

    /**
     * @return bool
     */
    public function isLastRoom()
    {
        return empty($this->nextRoom);
    }

    /**
     * @return Activity|null
     */
    public function getLastActivity() {
        if ($this->getActivities()) {
            return $this->getActivities()->last();
        }

        return null;
    }
}
