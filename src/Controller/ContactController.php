<?php


namespace App\Controller;


use App\Entity\PortfolioEmail;
use App\Form\ContactEmailType;
use App\Notification\ContactNotification;
use App\Repository\PortfolioContactRepository;
use App\Repository\PortfolioEmailRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{

    /**
     * @var PortfolioContactRepository
     */
    private $portfolioContactRepository;

    /**
     * @var PortfolioEmailRepository
     */
    private $portfolioEmailRepository;

    public function __construct(PortfolioContactRepository $portfolioContactRepository,
                                PortfolioEmailRepository $portfolioEmailRepository)
    {
        $this->portfolioContactRepository = $portfolioContactRepository;
        $this->portfolioEmailRepository = $portfolioEmailRepository;
    }


    /**
     * @Route(name="contact.index",path="/contact")
     * @param Request $request
     * @param ContactNotification $notification
     * @return Response
     */
    public function index(Request $request, ContactNotification $notification): Response
    {
        $contacts = $this->portfolioContactRepository->findAll();
        $email = new PortfolioEmail();
        $form = $this->createForm(ContactEmailType::class, $email);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $notification->notify($email);
            $em = $this->getDoctrine()->getManager();
            $em->persist($email);
            $em->flush();
            $this->addFlash('success', 'Votre message à été envoyé avec succès');
            return $this->redirectToRoute('contact.index');
        }

        return $this->render('page/contact.html.twig', [
            'contacts' => $contacts,
            'email' => $email,
            'form' => $form->createView()
        ]);
    }
}
