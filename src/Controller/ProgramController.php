<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/program', name: 'program_')]
class ProgramController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        if ($_POST){
           return $this->redirectToRoute('program_show', ['id' => $_POST['id']]);
        }
        return $this->render('program/index.html.twig');
    }


    #[Route('/{id<\d+>}/', name: 'show', methods: 'GET')]
    public function show($id = 1): Response
    {
        return $this->render('program/show.html.twig', [
            'id' => $id,
        ]);
     }
}
