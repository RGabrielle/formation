<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Categorie;
use AppBundle\Entity\Livre;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LivreController extends Controller
{

    /**
     * @Route("/livre", name="livre")
     */
    public function indexAction(){
        /*
         * getRepository(entité ciblée) : SELECT
         * 4 méthodes de sélection
         *      find(id) : récupérer un enregistrement par la PK
         *      findAll() : récupérer tous les enregistrements
         *      findBy() : récupérer plusieurs enregistrements par une liste de critères (par la valeur d'une colonne de la table)
         *      findOneBy() : récupérer un enregistrement par une liste de critères
         * */
        $doctrine = $this->getDoctrine();
        $results = $doctrine->getRepository(categorie::class)->findAll();
        //$results = $repository;
            //filtre les resultats (car trop de resultat peut planter avec var dump)
        //exit(dump($results));

        return $this->render('livre/index.html.twig', [
            'results' => $results
        ]);
    }
    /**
     * @Route("/livre/{id}", name="categorie.detail")
    */ 
   public function detailAction($id){
    
            $doctrine = $this->getDoctrine();
    
            $results = $doctrine->getRepository(categorie::class)->find(
                $id
            );
            //exit(dump($results));
            return $this->render('livre/detail.html.twig', [
                'results' => $results
            ]);
        }


    /**
     * @Route("/categorie/query", name="categorie.query")
    */ 
    public function catAction(){
        
            $doctrine=$this->getDoctrine();
    
            //appel d'une méthode de la classe de dépôt (Repository)
            $results = $doctrine->getRepository(Categorie::class)->categQuery();
           
            return $this->render('livre/index.html.twig', [
                'results' => $results
            ]);
            //exit(dump($results));
    
        }

   /**
     * @Route("/livre/query", name="livre.query")
    */ 
    public function queryAction(){
    
        $doctrine=$this->getDoctrine();

        //appel d'une méthode de la classe de dépôt (Repository)
        $results = $doctrine->getRepository(Livre::class)->testQuery();
        exit(dump($results));

    }
   

}