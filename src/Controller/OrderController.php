<?php

namespace App\Controller;

use App\Entity\Order;
use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Category;
use App\Entity\Pizza;
use App\Repository\CategoryRepository;
use App\Repository\PizzaRepository;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    /**
     * @Route("/order/{id}", name="app_order");
     */
    public function order(Request $request, Pizza $pizza, $id, OrderRepository $orderRepository){
        $pizzaName = $pizza->getNaam();

        $order = new Order();
        $order->setStatus("in progress");
        $form = $this->createFormBuilder($order)
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('adres', TextType::class)
            ->add('city', TextType::class)
            ->add('zipcode', TextType::class)
            ->add('status', TextType::class)

            ->add('Submit', SubmitType::class, ['label' =>
            'verzenden'])

            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $order = $form->getData();
            $orderRepository->add($order);

            return $this->redirectToRoute('app_contact');
        }
    }

}
