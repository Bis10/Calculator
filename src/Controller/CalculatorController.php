<?php

namespace App\Controller;

use App\Form\CalculatorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    #[Route('/', name: 'app_calculator')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(CalculatorType::class);
        $form->handleRequest($request);

        $result = null;
        $num1 = null;
        $num2 = null;
        $operation = null;

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $num1 = $data['num1'];
            $num2 = $data['num2'];
            $operation = $data['operation'];

            switch ($operation) {
                case 'add':
                    $result = $num1 + $num2;
                    break;
                case 'subtract':
                    $result = $num1 - $num2;
                    break;
                case 'multiply':
                    $result = $num1 * $num2;
                    break;
                case 'divide':
                    $result = ($num2 != 0) ? $num1 / $num2 : 'Cannot divide by zero';
                    break;
            }
        }

        return $this->render('calculator/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result,
            'num1' => $num1,
            'num2' => $num2,
            'operation' => $operation,
        ]);
    }
}
