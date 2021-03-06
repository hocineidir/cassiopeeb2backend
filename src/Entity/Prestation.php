<?php

namespace App\Entity;

use JsonSerializable;
use Doctrine\ORM\Mapping as ORM;

use App\Entity\Partenaire;


/**
 * @ORM\Entity(repositoryClass="App\Repository\PrestationRepository")
 */
class Prestation implements JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFin;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Evenement", inversedBy="prestations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $evenement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partenaire", inversedBy="prestationsProposees")
     * @ORM\JoinColumn(nullable=false)
     */
    private $partenaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Etat")
     */
    private $etatPrestation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypePrestation", inversedBy="prestations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typePrestation;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $note;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }



    public function getEvenement(): ?Evenement
    {
        return $this->evenement;
    }

    public function setEvenement(?Evenement $evenement): self
    {
        $this->evenement = $evenement;

        return $this;
    }

    public function getPartenaire(): ?Partenaire
    {
        return $this->partenaire;
    }

    public function setPartenaire(?Partenaire $partenaire): self
    {
        $this->partenaire = $partenaire;

        return $this;
    }

    public function getEtatPrestation(): ?Etat
    {
        return $this->etatPrestation;
    }

    public function setEtatPrestation(?Etat $etatPrestation): self
    {
        $this->etatPrestation = $etatPrestation;

        return $this;
    }

    public function getTypePrestation(): ?TypePrestation
    {
        return $this->typePrestation;
    }

    public function setTypePrestation(?TypePrestation $typePrestation): self
    {
        $this->typePrestation = $typePrestation;

        return $this;
    }
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'dateDebut' => $this->getDateDebut(),
            'dateFin' => $this->getDateFin(),
            'evenement' => $this->getEvenement(),
            'partenaire' => $this->getPartenaire(),
            'etatPrestation' => $this->getEtatPrestation(),
            'typePrestation' => $this->getTypePrestation(),
            'note' => $this->getNote(),
            
        ];
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(?float $note): self
    {
        $this->note = $note;

        return $this;
    }

}
