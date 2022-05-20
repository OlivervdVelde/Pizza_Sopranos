<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Category;
use App\Entity\Pizza;
use App\Repository\CategoryRepository;
use App\Repository\PizzaRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController
{
    /**
     * @Route("/order/{id}", name="app_order");
     */
    public function order(Request $request, Pizza $pizza, ManagerRegistry $managerRegistry){
        $pizzaName = $pizza->getName();

        $entityManager = $managerRegistry->getManager();
        $order = new Order();
        $order->setPizza($pizza);
        $order->setStatus("in progress");
        $form = $this->createForm(OrderType::class, $order);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $order = $form->getData();
            $entityManager->persist($order);
            $entityManager->flush();
            return $this->redirectToRoute('app_contact');
        }
    }

}
