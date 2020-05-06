<?php


namespace App\Controller;


use App\Entity\PortfolioContact;
use App\Entity\PortfolioExperience;
use App\Form\ContactType;
use App\Form\ExperienceType;
use App\Notification\ContactNotification;
use App\Repository\PortfolioContactRepository;
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

    public function __construct(PortfolioContactRepository $portfolioContactRepository)
    {
        $this->portfolioContactRepository = $portfolioContactRepository;
    }

//    /**
//     * @Route(name="contact.index",path="/contact")
//     * @return Response
//     */
//    public function contactIndex(): Response
//    {
//        return $this->render('page/contact.html.twig');
//    }


    /**
     * @Route(name="contact.index",path="/contact")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, ContactNotification $notification): Response
    {
        $contact = new PortfolioContact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $notification->notify($contact);
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            $this->addFlash('success', 'Votre message à été envoyé avec succès');
            return $this->redirectToRoute('contact.index');
        }

        return $this->render('page/contact.html.twig', [
            'contact' => $contact,
            'form' => $form->createView()
        ]);
    }
}
