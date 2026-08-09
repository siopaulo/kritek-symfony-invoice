<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Entity\InvoiceLine;
use App\Form\InvoiceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InvoiceController extends AbstractController
{
    #[Route('/invoice/new', name: 'invoice_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $invoice = new Invoice();
        $invoice->addInvoiceLine(new InvoiceLine());

        $form = $this->createForm(InvoiceType::class, $invoice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($invoice);
            $entityManager->flush();

            $this->addFlash('success', 'Invoice saved.');

            return $this->redirectToRoute('invoice_new');
        }

        return $this->render('invoice/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
