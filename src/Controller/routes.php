<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
class routes extends AbstractController
{
    #[Route(path: '/', name: 'home', methods: ['GET'])]
    public function index(Request $request): Response
    {

        $query=$request->query->get("search");


        return $this->render('base.html.twig',[
            'query'=>$query
        ]);
       
    }
    
}