<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/room")
 */
class RoomController extends Controller
{
    /**
     * @Route("/", name="room_index")
     */
    public function indexAction(Request $request)
    {
        return $this->render('room/index.html.twig');
    }
}
