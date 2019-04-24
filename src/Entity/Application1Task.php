<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Application1TaskRepository")
 */
class Application1Task
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
    private $name;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $startedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $finishedAt;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Application1Objectif", inversedBy="tasks")
     */
    private $objectifs;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="application1Tasks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Application1Date", mappedBy="taskComplete")
     */
    private $datesComplete;

    public function __construct()
    {
        $this->objectifs = new ArrayCollection();
        $this->datesComplete = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStartedAt(): ?\DateTimeInterface
    {
        return $this->startedAt;
    }

    public function setStartedAt(?\DateTimeInterface $startedAt): self
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    public function getFinishedAt(): ?\DateTimeInterface
    {
        return $this->finishedAt;
    }

    public function setFinishedAt(?\DateTimeInterface $finishedAt): self
    {
        $this->finishedAt = $finishedAt;

        return $this;
    }

    /**
     * @return Collection|Application1Objectif[]
     */
    public function getObjectifs(): Collection
    {
        return $this->objectifs;
    }

    public function addObjectif(Application1Objectif $objectif): self
    {
        if (!$this->objectifs->contains($objectif)) {
            $this->objectifs[] = $objectif;
        }

        return $this;
    }

    public function removeObjectif(Application1Objectif $objectif): self
    {
        if ($this->objectifs->contains($objectif)) {
            $this->objectifs->removeElement($objectif);
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Application1Date[]
     */
    public function getDatesComplete(): Collection
    {
        return $this->datesComplete;
    }

    public function addDatesComplete(Application1Date $datesComplete): self
    {
        if (!$this->datesComplete->contains($datesComplete)) {
            $this->datesComplete[] = $datesComplete;
            $datesComplete->addTaskComplete($this);
        }

        return $this;
    }

    public function removeDatesComplete(Application1Date $datesComplete): self
    {
        if ($this->datesComplete->contains($datesComplete)) {
            $this->datesComplete->removeElement($datesComplete);
            $datesComplete->removeTaskComplete($this);
        }

        return $this;
    }
}
