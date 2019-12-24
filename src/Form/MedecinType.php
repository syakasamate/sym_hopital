<?php

namespace App\Form;

use App\Entity\Medecin;
use App\Entity\Service;
use App\Entity\Specialite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MedecinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('matricule',HiddenType::class)
        ->add('service', EntityType::class,[
            'class'=>Service::class,
            'choice_label'=>'libelle',
            'choice_value' =>function(Service $service=null)   {
                 return $service ? $service->getLibelle() : '';
                }
            
        ])
        ->add('prenom')
        ->add('nom')
        ->add('datenais', DateType::class, [
            'widget' => 'single_text',
            'format' => 'yyyy-MM-dd']) 
            ->add('nbmed')
            ->add('specialites',EntityType::class,[
              'class' =>Specialite::class,
              'choice_label' => 'libelle',
              'multiple' => true,
              'by_reference'=>false
            ])
            ->add('telephone')

            ->add('save', SubmitType::class,["label"=>"Enregistre"]);
            
}


public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults([
        'data_class' => Medecin::class,
    ]);
}
}
?>
