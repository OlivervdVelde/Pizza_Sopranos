<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Pizza;
use App\Repository\CategoryRepository;
use App\Repository\PizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PizzaController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function homepage(CategoryRepository $category): Response
    {
        $categories = $category->findAll();
        return $this->render("home.html.twig", ['categories' => $categories

            ]
        );
    }

    /**
     * @Route("/category/{id}", name="app_category")
     */
    public function pizza($id, CategoryRepository $category, PizzaRepository $pizzaRepository)
    {
        $pizzas = $pizzaRepository->findBy(["category" => $id]);

        return $this->render("pizza.html.twig",
            ['pizzas' => $pizzas]);
    }
}