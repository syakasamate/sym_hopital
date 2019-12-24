<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use ApiPlatform\Core\Annotation\ApiResource;
/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\MedecinRepository")
 * 
 */
class Medecin
{
    /**
     * 
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $matricule;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Service", inversedBy="medecins")
     * @ORM\JoinColumn(nullable=false)
     */
    private $service;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;
      
    /**
     *@Assert\Length(min="0", minMessage="le nom ne doit pas etre vide ")
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="date")
     */
    private $datenais;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nbMed;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Specialite", mappedBy="medecins", cascade={"persist"})
     */
    private $specialites;

    /**
     *@Assert\Regex(pattern="#^(77|78|70|76)[0-9]{7}$#",message="numero non valide ")
     * @ORM\Column(type="string", length=255)
     */
    
    private $telephone;

  

    public function __construct()
    {
        $this->specialites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDatenais(): ?\DateTimeInterface
    {
        return $this->datenais;
    }

    public function setDatenais(\DateTimeInterface $datenais): self
    {
        $this->datenais = $datenais;

        return $this;
    }

    public function getNbMed(): ?string
    {
        return $this->nbMed;
    }

    public function setNbMed(string $nbMed): self
    {
        $this->nbMed = $nbMed;

        return $this;
    }

    /**
     * @return Collection|Specialite[]
     */
    public function getSpecialites(): Collection
    {
        return $this->specialites;
    }

    public function addSpecialite(Specialite $specialite): self
    {
        if (!$this->specialites->contains($specialite)) {
            $this->specialites[] = $specialite;
            $specialite->addMedecin($this);
        }

        return $this;
    }





   /*  public function addSpecialite(Specialite $specialite)
    {
        // Si l'objet fait déjà partie de la collection on ne l'ajoute pas
        if (!$this->specialites->contains($specialite)) {
            if (!$specialite->getMedecin()->contains($this)) {
                $specialite->addMedecin($this);  // Lie le Client au produit.
            }
            $this->specialites->add($specialites);
        }
    }*/
    public function setSpecialites($items)
    {
        if ($items instanceof ArrayCollection || is_array($items)) {
            foreach ($items as $item) {
                $this->addSpecialite($item);
            }
        } elseif ($items instanceof Client) {
            $this->addSpecialite($items);
        } else {
            throw new Exception("$items must be an instance of Client or ArrayCollection");
        }
    }






    public function removeSpecialite(Specialite $specialite): self
    {
        if ($this->specialites->contains($specialite)) {
            $this->specialites->removeElement($specialite);
            $specialite->removeMedecin($this);
        }
        

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }
}
