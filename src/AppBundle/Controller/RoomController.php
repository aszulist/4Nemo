<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Room;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/room")
 */
class RoomController extends Controller
{
    /**
     * @Route("/{id}", name="room_index")
     *
     * @param Room $room
     *
     * @return Response
     */
    public function indexAction(Room $room) {
        return $this->render('room/index.html.twig', [
            'room' => $room
        ]);
    }
}
