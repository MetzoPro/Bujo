<?php

namespace App\Controller;


use App\Repository\CalendarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PlaningController extends AbstractController
{
    /**
     * @Route("/planning", name="planning")
     */
    public function index(CalendarRepository $calendar)
    {
        $events = $calendar->findAll();

        $rdv = [];

        foreach($events as $event){
            $rdv[] = [
                'id' => $event->getId(),
                'start' => $event->getStart()->format('Y-m-d H:i:s'),
                'end' => $event->getFin()->format('Y-m-d H:i:s'),
                'title' => $event->getTitle(),
                'description' => $event->getDescription(),
                'backgroundColor' => $event->getBackgroundColor(),
                'borderColor' => $event->getBorderColor(),
                'textColor' => $event->getTextColor(),
                'allDay' => $event->getAllDay(),
            ];
        }

        $data = json_encode($rdv);

        return $this->render('planing/index.html.twig', compact('data'));
    }
}
