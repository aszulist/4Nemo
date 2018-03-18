<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Activity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/activity")
 */
class ActivityController extends Controller
{
    /**
     * @Route("/{id}", name="activity_index")
     */
    public function indexAction(Request $request, Activity $activity = null)
    {
        return $this->render('room/index.html.twig', ['room' => $activity->getRoom(), 'activity' => $activity]);
    }
}
