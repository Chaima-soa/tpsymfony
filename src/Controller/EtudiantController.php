<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    #[Route('/etudiant', name: 'etudiant')]
    public function index(): Response
    {
        return new Response('Bonjour mes étudiants');
    }

    #[Route('/etudiant/{id}', name: 'affichage_etudiant', requirements: ['id' => '\d2'])]
    public function affichageEtudiant($id): Response
    {
        return new Response("Bonjour l'étudiant numéro $id");
    }

    #[Route('/etudiant/name/{name}', name: 'etudiant_name')]
    public function voirNom(string $name): Response
    {
        return $this->render('etudiant/etudiant.html.twig', [
            'name' => $name,
        ]);
    }

    #[Route('/list', name: 'liste')]
    public function listEtudiant(): Response
    {
        // Liste des étudiants
        $etudiants = ["Ali", "Med"];

        // Liste des modules
        $modules = [
            [
                "nom" => "Symfony",
                "id" => 1,
                "enseignant" => "Ali",
                "nbrHeures" => 42,
                "date" => "12-12-2021"
            ],
            [
                "nom" => "JEE",
                "id" => 2,
                "enseignant" => "Med",
                "nbrHeures" => 31,
                "date" => "12-10-2021"
            ],
            [
                "nom" => "BD",
                "id" => 3,
                "enseignant" => "Islem",
                "nbrHeures" => 21,
                "date" => "12-09-2021"
            ]
        ];

        // Render the Twig template
        return $this->render('etudiant/liste.html.twig', [
            'etudiants' => $etudiants,
            'ListeModules' => $modules
        ]);
    }

    #[Route('/affectation', name: 'affectation')]
    public function affecter(): Response
    {
        // Liste des modules
        $modules = [
            [
                "nom" => "Symfony",
                "id" => 1,
                "enseignant" => "Ali",
                "nbrHeures" => 42,
                "date" => "12-12-2021"
            ],
            [
                "nom" => "JEE",
                "id" => 2,
                "enseignant" => "Med",
                "nbrHeures" => 31,
                "date" => "12-10-2021"
            ],
            [
                "nom" => "BD",
                "id" => 3,
                "enseignant" => "Islem",
                "nbrHeures" => 21,
                "date" => "12-09-2021"
            ]
        ];

        return $this->render('etudiant/azr.html.twig', [
            'ListeModules' => $modules
        ]);
    }

    #[Route('/indexFils', name: 'index_fils')]
    public function indexFils()
    {
        return $this->render(view: 'etudiant/index.html.twig');
    }
}
