<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Form\CommentType;
use App\Service\CommentProcessor;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    public function index(Request $request, CommentProcessor $commentProcessor): Response
    {
        $form = $this->createForm(CommentType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment = $form->get('comment')->getData();
            
            try {
                $commentProcessor->process($comment);
                $this->redirectToRoute('home');
            } catch (\InvalidArgumentException $e) {
                dump($e->getMessage());
            }
        }
        
        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}