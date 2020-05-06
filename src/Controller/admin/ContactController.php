<?php


namespace App\Controller\admin;


use App\Entity\PortfolioContact;
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
            $this->addFlash('danger', 'Le email a bien été supprimée');
            return $this->redirectToRoute('admin.contact');
        }

    }

}
