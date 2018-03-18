<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Activity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/activity")
 */
class ActivityController extends Controller
{
    /**
     * @Route("/{id}", name="activity_index")
     * @param Activity|null $activity
     *
     * @return Response
     */
    public function indexAction(Activity $activity = null)
    {
        return $this->render('activity/index.html.twig', [
            'room' => $activity->getRoom(),
            'activity' => $activity
        ]);
    }
}
