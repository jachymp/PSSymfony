<?php

namespace App\Controller;

use App\Repository\LineupRepository;
use App\Repository\YearRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LineupController extends AbstractController
{
    private array $data;
    public function __construct(LineupRepository $lineupRepository, YearRepository $yearRepository)
    {
        $lastYear = $yearRepository->getLastYear();
        $this->data = $lineupRepository->findByLastYear($lastYear['lastYearId']);

        foreach ($this->data as $lineup) {
            $lineup->artist_start = $lineup->getTimeFrom()->format('H:i:s');
        }
    }
    public function artistOrder(): Response
    {
        return $this->render('lineup/index.html.twig', [
            'artists' => $this->data,
        ]);
    }
}
