<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

//#[Route('/events')]
class OldEventController extends AbstractController
{
//    #[Route('/', name: 'app_event_index', methods: ['GET'])]
    public function index(EventRepository $eventRepository): Response
    {
        return $this->render('event/index.html.twig', [
            'events' => $eventRepository->findAll(),
        ]);
    }

//    #[Route('/new', name: 'app_event_new', methods: ['GET', 'POST'])]
//    public function new(Request $request, EntityManagerInterface $entityManager, #[Autowire('%images_dir%')] string $imagesDir): Response
//    {
//        $event = new Event();
//        $form = $this->createForm(EventType::class, $event);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $entityManager->persist($event);
//
//            if ($image = $form['image']->getData()) {
//                $filename = bin2hex(random_bytes(6)) . '.' . $image->guessExtension();
//                $image->move($imagesDir, $filename);
//                $event->setImageName($filename);
//            }
//
//            $entityManager->flush();
//
//            return $this->redirectToRoute('app_event_index', [], Response::HTTP_SEE_OTHER);
//        }
//
//        return $this->render('event/new.html.twig', [
//            'event' => $event,
//            'form' => $form,
//        ]);
//    }

//    #[Route('/{id}', name: 'app_event_show', methods: ['GET'])]
    public function show(Event $event): Response
    {
        return $this->render('event/show.html.twig', [
            'event' => $event,
        ]);
    }

//    #[Route('/{id}/edit', name: 'app_event_edit', methods: ['GET', 'POST'])]
//    public function edit(Request $request, Event $event, EntityManagerInterface $entityManager, #[Autowire('%images_dir%')] string $imagesDir): Response
//    {
//        $form = $this->createForm(EventType::class, $event);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            if ($image = $form['image']->getData()) {
//                $filename = bin2hex(random_bytes(6)) . '.' . $image->guessExtension();
//                $image->move($imagesDir, $filename);
//                $event->setImageName($filename);
//            }
//
//            $entityManager->flush();
//
//            return $this->redirectToRoute('app_event_index', [], Response::HTTP_SEE_OTHER);
//        }
//
//        return $this->render('event/edit.html.twig', [
//            'event' => $event,
//            'form' => $form,
//        ]);
//    }

//    #[Route('/{id}', name: 'app_event_delete', methods: ['POST'])]
    public function delete(Request $request, Event $event, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $event->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($event);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_event_index', [], Response::HTTP_SEE_OTHER);
    }
}
