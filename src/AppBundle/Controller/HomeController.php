<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Room;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction() {

        $firstRoom = null;
        try {
            $firstRoom = $this->getDoctrine()->getRepository(Room::class)->getFirstRoom();
        } catch (NoResultException $e) {
        } catch (NonUniqueResultException $e) {
        }

        return $this->render('home/index.html.twig', [
            'room' => $firstRoom
        ]);
    }
}
