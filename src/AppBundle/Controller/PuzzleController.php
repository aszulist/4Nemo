<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PuzzleController extends Controller
{
    public function indexAction(SessionInterface $session) {
        $unlockedKeys = $session->get('unlocked_keys');
        return $this->render('puzzle/index.html.twig', ['keys' => $unlockedKeys]);
    }

    /**
     * @Route("/puzzle-unlock", name="puzzle")
     */
    public function unlockAction(Request $request, SessionInterface $session)
    {
        $unlockedKeys = $session->get('unlocked_keys', []);
        $unlockedKeys[] = $request->request->get('unlocked_key', 1);
        $unlockedKeys = array_unique($unlockedKeys);
        $session->set('unlocked_keys', $unlockedKeys);
        return new JsonResponse([]);
    }
}