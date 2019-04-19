<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DeveloperTechnologicalMonitoringRepository")
 * @ApiResource
 */
class DeveloperTechnologicalMonitoring
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
    private $title;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $version;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="developerTechnologicalMonitoringClicked")
     */
    private $usersWhoHaveSeen;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $externalId;

    public function __construct()
    {
        $this->usersWhoHaveSeen = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsersWhoHaveSeen(): Collection
    {
        return $this->usersWhoHaveSeen;
    }

    public function addUsersWhoHaveSeen(User $usersWhoHaveSeen): self
    {
        if (!$this->usersWhoHaveSeen->contains($usersWhoHaveSeen)) {
            $this->usersWhoHaveSeen[] = $usersWhoHaveSeen;
            $usersWhoHaveSeen->addDeveloperTechnologicalMonitoringClicked($this);
        }

        return $this;
    }

    public function removeUsersWhoHaveSeen(User $usersWhoHaveSeen): self
    {
        if ($this->usersWhoHaveSeen->contains($usersWhoHaveSeen)) {
            $this->usersWhoHaveSeen->removeElement($usersWhoHaveSeen);
            $usersWhoHaveSeen->removeDeveloperTechnologicalMonitoringClicked($this);
        }

        return $this;
    }

    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    public function setExternalId(?string $externalId): self
    {
        $this->externalId = $externalId;

        return $this;
    }
}
