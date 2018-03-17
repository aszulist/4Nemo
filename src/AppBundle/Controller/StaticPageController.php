<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 *
 * Class StaticPageController
 * @package AppBundle\Controller
 */
class StaticPageController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }


    /**
     *
     * @Route("/example")
     * @return string
     */
    public function examplePage() {
        return $this->render('static-page/example.html.twig');
    }

}
