<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LocatorController extends AbstractController
{
    public function index()
    {


        return $this->render('locator/index.html.twig');
    }
}
