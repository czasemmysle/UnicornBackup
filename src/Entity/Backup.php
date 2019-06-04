<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BackupRepository")
 */
class Backup
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $IdVM;

    /**
     * @ORM\Column(type="date")
     */
    private $data;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $hash;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $EtykietaPlan;

    /**
     * @ORM\Column(type="integer")
     */
    private $FBackup;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Komunikat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Plan", inversedBy="backups")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Plan;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\VM", inversedBy="backups")
     * @ORM\JoinColumn(nullable=false)
     */
    private $VM;

    public function __toString()
    {
        return (string)$this->id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdVM(): ?int
    {
        return $this->IdVM;
    }

    public function setIdVM(int $IdVM): self
    {
        $this->IdVM = $IdVM;

        return $this;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getEtykietaPlan(): ?string
    {
        return $this->EtykietaPlan;
    }

    public function setEtykietaPlan(string $EtykietaPlan): self
    {
        $this->EtykietaPlan = $EtykietaPlan;

        return $this;
    }

    public function getFBackup(): ?int
    {
        return $this->FBackup;
    }

    public function setFBackup(int $FBackup): self
    {
        $this->FBackup = $FBackup;

        return $this;
    }

    public function getKomunikat(): ?string
    {
        return $this->Komunikat;
    }

    public function setKomunikat(?string $Komunikat): self
    {
        $this->Komunikat = $Komunikat;

        return $this;
    }

    public function getPlan(): ?Plan
    {
        return $this->Plan;
    }

    public function setPlan(?Plan $Plan): self
    {
        $this->Plan = $Plan;

        return $this;
    }

    public function getVM(): ?VM
    {
        return $this->VM;
    }

    public function setVM(?VM $VM): self
    {
        $this->VM = $VM;

        return $this;
    }
}
