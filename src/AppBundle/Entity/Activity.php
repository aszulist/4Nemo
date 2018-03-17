<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activity
 *
 * @ORM\Table(name="activity")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActivityRepository")
 */
class Activity
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
     * @var int
     *
     * @ORM\Column(name="sort_by", type="integer")
     */
    private $sortBy;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Room", inversedBy="activities")
     * @ORM\JoinColumn(name="room_id", referencedColumnName="id")
     */
    private $room;

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
     * @return Activity
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
     * @return Activity
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
     * @return Activity
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
     * Set sortBy
     *
     * @param integer $sortBy
     *
     * @return Activity
     */
    public function setSortBy($sortBy)
    {
        $this->sortBy = $sortBy;

        return $this;
    }

    /**
     * Get sortBy
     *
     * @return int
     */
    public function getSortBy()
    {
        return $this->sortBy;
    }

    /**
     * Set room
     *
     * @param Room $room
     *
     * @return Activity
     */
    public function setRoom(Room $room = null)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Get room
     *
     * @return Room
     */
    public function getRoom()
    {
        return $this->room;
    }
}
