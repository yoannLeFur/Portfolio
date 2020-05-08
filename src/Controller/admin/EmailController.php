<?php


namespace App\Controller\admin;


use App\Entity\PortfolioEmail;
use App\Repository\PortfolioEmailRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmailController extends AbstractController
{

    /**
     * @var PortfolioEmailRepository
     */
    private $portfolioEmailRepository;

    public function __construct(PortfolioEmailRepository $portfolioEmailRepository )
    {
        $this->portfolioEmailRepository = $portfolioEmailRepository;
    }


    /**
     * @Route("/administration/email/{id}", name="admin.email.delete", methods="DELETE")
     * @param PortfolioEmail $email
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function delete(PortfolioEmail $email, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $email->getId(), $request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($email);
            $entityManager->flush();
            $this->addFlash('danger', 'L\"email a bien été supprimé');
            return $this->redirectToRoute('admin.contact');
        }

    }

}
