<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlanRepository")
 */
class Plan
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $EtykietaPlan;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DataStart;

    /**
     * @ORM\Column(type="array")
     */
    private $ListaVM = [];

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $IpStorageF;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $IpStorageDB;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $IpStorageVM;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $IpFinalStorage;

    /**
     * @ORM\Column(type="integer")
     */
    private $Flag;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $interwal;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $days = [];

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Backup", mappedBy="Plan", orphanRemoval=true)
     */
    private $backups;

    public function __toString()
    {
    return (string)$this->id;
    }


    public function __construct()
    {
        $this->backups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDataStart(): ?\DateTimeInterface
    {
        return $this->DataStart;
    }

    public function setDataStart(\DateTimeInterface $DataStart): self
    {
        $this->DataStart = $DataStart;

        return $this;
    }

    public function getListaVM(): ?array
    {
        return $this->ListaVM;
    }

    public function setListaVM(array $ListaVM): self
    {
        $this->ListaVM = $ListaVM;

        return $this;
    }

    public function getIpStorageF(): ?string
    {
        return $this->IpStorageF;
    }

    public function setIpStorageF(string $IpStorageF): self
    {
        $this->IpStorageF = $IpStorageF;

        return $this;
    }

    public function getIpStorageDB(): ?string
    {
        return $this->IpStorageDB;
    }

    public function setIpStorageDB(string $IpStorageDB): self
    {
        $this->IpStorageDB = $IpStorageDB;

        return $this;
    }

    public function getIpStorageVM(): ?string
    {
        return $this->IpStorageVM;
    }

    public function setIpStorageVM(string $IpStorageVM): self
    {
        $this->IpStorageVM = $IpStorageVM;

        return $this;
    }

    public function getIpFinalStorage(): ?string
    {
        return $this->IpFinalStorage;
    }

    public function setIpFinalStorage(string $IpFinalStorage): self
    {
        $this->IpFinalStorage = $IpFinalStorage;

        return $this;
    }

    public function getFlag(): ?int
    {
        return $this->Flag;
    }

    public function setFlag(int $Flag): self
    {
        $this->Flag = $Flag;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(?int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getInterwal(): ?string
    {
        return $this->interwal;
    }

    public function setInterwal(?string $interwal): self
    {
        $this->interwal = $interwal;

        return $this;
    }

    public function getDays(): ?array
    {
        return $this->days;
    }

    public function setDays(?array $days): self
    {
        $this->days = $days;

        return $this;
    }

    /**
     * @return Collection|Backup[]
     */
    public function getBackups(): Collection
    {
        return $this->backups;
    }

    public function addBackup(Backup $backup): self
    {
        if (!$this->backups->contains($backup)) {
            $this->backups[] = $backup;
            $backup->setPlan($this);
        }

        return $this;
    }

    public function removeBackup(Backup $backup): self
    {
        if ($this->backups->contains($backup)) {
            $this->backups->removeElement($backup);
            // set the owning side to null (unless already changed)
            if ($backup->getPlan() === $this) {
                $backup->setPlan(null);
            }
        }

        return $this;
    }
}
