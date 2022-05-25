<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categorys = $categoryRepository->findAll();

        return $this->render('category/index.html.twig', [
            'categorys' => $categorys,
        ]);
    }

    #[Route('/{categoryName}', name: 'show')]
    public function show(string $categoryName, CategoryRepository $categoryRepository, ProgramRepository $programRepository): Response
    {
        $categorys = $categoryRepository->findOneBy(["name"=>$categoryName]);

        if (!$categorys){
            throw $this->createNotFoundException(
                'Pas de série trouvée avec la catégorie : ' . $categoryName
            );
        }

        $programs = $programRepository->findBy(
            ['category' => $categorys->getId()],
            ['id' => 'DESC'],
            3,
        );

        return $this->render('category/show.html.twig', ['programs' => $programs]);
    }
}
