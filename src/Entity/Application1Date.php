<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Application1DateRepository")
 */
class Application1Date
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
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="application1Dates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Application1Task", inversedBy="datesComplete")
     */
    private $taskComplete;

    public function __construct()
    {
        $this->taskComplete = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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
     * @return Collection|Application1Task[]
     */
    public function getTaskComplete(): Collection
    {
        return $this->taskComplete;
    }

    public function addTaskComplete(Application1Task $taskComplete): self
    {
        if (!$this->taskComplete->contains($taskComplete)) {
            $this->taskComplete[] = $taskComplete;
        }

        return $this;
    }

    public function removeTaskComplete(Application1Task $taskComplete): self
    {
        if ($this->taskComplete->contains($taskComplete)) {
            $this->taskComplete->removeElement($taskComplete);
        }

        return $this;
    }
}
