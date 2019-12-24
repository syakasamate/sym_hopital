<?php

namespace App\Controller;

use App\Form\SpecialiteType;
use App\Entity\Medecin;
use App\Entity\Service;
use App\Entity\Specialite;
use App\Form\MedecinType;
use App\Form\ServiceType;
use App\Repository\MedecinRepository;
use App\Repository\ServiceRepository;
use App\Repository\SpecialiteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin.service.show")
     */
    public function showService(ServiceRepository $repos)
    {
        $services = $repos->findAll();
        return $this->render('admin/index.html.twig', [
            'sowservice' => true,
            'services' => $services,
            'title'=>'Liste Service'

        ]);
    }

    /**
     * @Route("/admin/add", name="admin.service.add")
     */
    public function addService(Request $request)
    {
        $service = new Service();
        // ...

        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($service);
            $entityManager->flush();

            return $this->redirectToRoute('admin.service.show');
        }

        return $this->render('admin/form.html.twig', [
            'form' => $form->createView(),
            'addservice' => true,
            'title'=>'Ajout Service'

        ]);
    }
    /**
     * @Route("/admin/edit/{id}", name="admin.service.edit")
     */
    public function editService($id, Request $request, ServiceRepository $repos)
    {
        $service = $repos->find($id);
        // ...

        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


        
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($service);
            $entityManager->flush();

            return $this->redirectToRoute('admin.service.show');
        }

        return $this->render('admin/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/delete/{id}", name="admin.service.delete")
     */
    public function deleteService($id, ServiceRepository $repos)
    {
        $service = $repos->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($service);
        $entityManager->flush();

        return $this->redirectToRoute('admin.service.show');
    }



    /**
     * @Route("/admin/addM", name="admin.Medecin.addM")
     */
    public function addMedecin(Request $request, MedecinRepository $repos)
    {
        $medecin = new Medecin();
        dump($repos->max());
        $form = $this->createForm(MedecinType::class, $medecin);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


         
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($medecin);

            $entityManager->flush();
          
         return  $this->redirectToRoute('admin.medecin.show');
        }


         
      
        $count= $repos->max();
        foreach ($count as $k ) {
            
        }

       $count=(sprintf("%05d",$k+1));

        return $this->render('admin/formMed.html.twig', [
            'addmedecin' => true,
            'formMedecin' => $form->createView(),
            'count' => $count,
            'title'=>'Ajout Medecin'

        ]);
    }
    /**
     * @Route("/admin/editM/{id}", name="admin.Medecin.edit")
     */
    public function editMedecin($id, Request $request, MedecinRepository $repos)
    {
        $medecin = $repos->find($id);
        $form = $this->createForm(MedecinType::class, $medecin);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


        
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($medecin);

            $entityManager->flush();
            return  $this->redirectToRoute('admin.medecin.show');
        }
     
        return $this->render('admin/editeM.html.twig', [
            'formMedecin' => $form->createView(),
            'mainNavLogin' => true

            
        ]);
    }
    /**
     * @Route("/admin/deleteM/{id}", name="admin.Medecin.delete")
     */
    public function deleteMedecin($id, MedecinRepository $repos)
    {
        $service = $repos->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($service);
        $entityManager->flush();

        return $this->redirectToRoute('admin.medecin.show');
    }
    /**
     * @Route("/admin/showM", name="admin.medecin.show")
     */
    public function showMedecin(MedecinRepository $repos)
    {
        $medecins = $repos->findAll();

        return $this->render('admin/showM.html.twig', [
            'medecins' => $medecins,
            'sowmedecin' => true,
            'title'=>'Liste  Medecin' 

        ]);
    }

    /**
     * @Route("/admin/addSp", name="admin.specialite.addSp")
     */
    public function addSpecialite(Request $request)
    {
        $specialite = new Specialite();
        $form = $this->createForm(SpecialiteType::class, $specialite);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($specialite);

            $entityManager->flush();
            return  $this->redirectToRoute('admin.specialite.show');
        }

        return $this->render('admin/formSp.html.twig', [
            'formSpecilite' => $form->createView(),
            'addspecialite' => true,
            'title'=>'Ajout Specialite'

        ]);
    }
    /**
     * @Route("/admin/editS/{id}", name="admin.specialite.edit")
     */
    public function specialiteedit($id,Request $request, SpecialiteRepository $repos)
    {
        $specialite = $repos->find($id);
        $form = $this->createForm(SpecialiteType::class, $specialite);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($specialite);

            $entityManager->flush();
            return  $this->redirectToRoute('admin.specialite.show');
        }

        return $this->render('admin/formSp.html.twig', [
            'formSpecilite' => $form->createView(),
            'addspecialite' => true,
            'title'=>'Ajout Specialite'

        ]);
    }
     /**
     * @Route("/admin/deleteS/{id}", name="admin.Specialite.delete")
     */
    public function deleteSpecialite($id, SpecialiteRepository $repos)
    {
        $specialite = $repos->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($specialite);
        $entityManager->flush();

        return $this->redirectToRoute('admin.specialite.show');
    }
    /**
     * @Route("/admin/showSp", name="admin.specialite.show")
     */
    public function showSpecialite(SpecialiteRepository $repos)
    {
        $specialite = $repos->findAll();
        return $this->render('admin/showSp.html.twig', [
            'specialites' => $specialite,
            'sowspecialite' => true,
            'title'=>'Liste Specialite'

        ]);
    }
}
