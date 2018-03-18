<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Room;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/room")
 */
class RoomController extends Controller
{
    /**
     * @Route("/{id}", name="room_index")
     */
    public function indexAction(Request $request, Room $room = null)
    {
        return $this->render('room/index.html.twig', ['room', $room]);
    }
}
