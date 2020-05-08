<?php


namespace App\Controller\admin;


use App\Entity\PortfolioContact;
use App\Form\ContactType;
use App\Repository\PortfolioContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @var PortfolioContactRepository
     */
    private $portfolioContactRepository;

    public function __construct(PortfolioContactRepository $portfolioContactRepository )
    {
        $this->portfolioContactRepository = $portfolioContactRepository;
    }

    /**
     * @Route(name="admin.contact.create",path="/administration/contact-create")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $contact = new PortfolioContact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            $this->addFlash('success', 'Une nouvelle création dans la catégorie " Contact" s\'est effectuée avec succès');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('contact/new.html.twig', [
            'contact' => $contact,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/contact/{id}", name="admin.contact.edit", methods="GET|POST")
     * @param PortfolioContact $contact
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(PortfolioContact $contact, Request $request)
    {
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('primary', 'Les informations ont bien étées modifier avec succès');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('contact/edit.html.twig', [
            'contact' => $contact,
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/administration/contact/{id}", name="admin.contact.delete", methods="DELETE")
     * @param PortfolioContact $contact
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function delete(PortfolioContact $contact, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $contact->getId(), $request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contact);
            $entityManager->flush();
            $this->addFlash('danger', 'Les informations ont bien été supprimé');
            return $this->redirectToRoute('admin.index');
        }

    }
}
