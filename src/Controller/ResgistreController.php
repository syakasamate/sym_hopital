<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ResgistreController extends AbstractController
{
    /**
     * @Route("/resgistre", name="connection")
     */
    public function registration(Request $request, UserPasswordEncoderInterface $encoder )
    {
            $user = new User();

    $form = $this->createForm(UserType::class, $user );
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      
         $hsh=$encoder->encodePassword($user,$user->getPassword());
         $user->setPassword(($hsh));
         $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
         $entityManager->flush();

    }
        return $this->render('resgistre/registration.html.twig', [
            'connection'=>true,
            'form'=>$form->createView(),
            'title'=>'Inscription'
        ]);
    }
    /**
     * @Route("/login", name="login_form")
     */
    public function login(AuthenticationUtils $authenticationUtils){
        $error = $authenticationUtils->getLastAuthenticationError();
         
        return $this->render('resgistre/login.html.twig',[
            'error' => $error,
            'login' => true,
            'title'=>'Connexion'
        ]);
    }
    /**
     * @Route("/logout", name="logout")
     */
    public function logout(){

    }
      /**
     * @Route("/", name="acceuil")
     */
    public function acceuil(){

        return $this->render('resgistre/acceuil.html.twig',[
            'Home' => true
        ]);

    }
}
