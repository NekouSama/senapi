<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\DeveloperTechnologicalMonitoring", inversedBy="usersWhoHaveSeen")
     */
    private $developerTechnologicalMonitoringClicked;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Application1Task", mappedBy="user")
     */
    private $application1Tasks;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Application1Objectif", mappedBy="user")
     */
    private $application1Objectifs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Application1Date", mappedBy="user")
     */
    private $application1Dates;

    public function __construct()
    {
        $this->developerTechnologicalMonitoringClicked = new ArrayCollection();
        $this->application1Tasks = new ArrayCollection();
        $this->application1Objectifs = new ArrayCollection();
        $this->application1Dates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string)$this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string)$this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return Collection|DeveloperTechnologicalMonitoring[]
     */
    public function getDeveloperTechnologicalMonitoringClicked(): Collection
    {
        return $this->developerTechnologicalMonitoringClicked;
    }

    public function addDeveloperTechnologicalMonitoringClicked(DeveloperTechnologicalMonitoring $developerTechnologicalMonitoringClicked): self
    {
        if (!$this->developerTechnologicalMonitoringClicked->contains($developerTechnologicalMonitoringClicked)) {
            $this->developerTechnologicalMonitoringClicked[] = $developerTechnologicalMonitoringClicked;
        }

        return $this;
    }

    public function removeDeveloperTechnologicalMonitoringClicked(DeveloperTechnologicalMonitoring $developerTechnologicalMonitoringClicked): self
    {
        if ($this->developerTechnologicalMonitoringClicked->contains($developerTechnologicalMonitoringClicked)) {
            $this->developerTechnologicalMonitoringClicked->removeElement($developerTechnologicalMonitoringClicked);
        }

        return $this;
    }

    /**
     * @return Collection|Application1Task[]
     */
    public function getApplication1Tasks(): Collection
    {
        return $this->application1Tasks;
    }

    public function addApplication1Task(Application1Task $application1Task): self
    {
        if (!$this->application1Tasks->contains($application1Task)) {
            $this->application1Tasks[] = $application1Task;
            $application1Task->setUser($this);
        }

        return $this;
    }

    public function removeApplication1Task(Application1Task $application1Task): self
    {
        if ($this->application1Tasks->contains($application1Task)) {
            $this->application1Tasks->removeElement($application1Task);
            // set the owning side to null (unless already changed)
            if ($application1Task->getUser() === $this) {
                $application1Task->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Application1Objectif[]
     */
    public function getApplication1Objectifs(): Collection
    {
        return $this->application1Objectifs;
    }

    public function addApplication1Objectif(Application1Objectif $application1Objectif): self
    {
        if (!$this->application1Objectifs->contains($application1Objectif)) {
            $this->application1Objectifs[] = $application1Objectif;
            $application1Objectif->setUser($this);
        }

        return $this;
    }

    public function removeApplication1Objectif(Application1Objectif $application1Objectif): self
    {
        if ($this->application1Objectifs->contains($application1Objectif)) {
            $this->application1Objectifs->removeElement($application1Objectif);
            // set the owning side to null (unless already changed)
            if ($application1Objectif->getUser() === $this) {
                $application1Objectif->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Application1Date[]
     */
    public function getApplication1Dates(): Collection
    {
        return $this->application1Dates;
    }

    public function addApplication1Date(Application1Date $application1Date): self
    {
        if (!$this->application1Dates->contains($application1Date)) {
            $this->application1Dates[] = $application1Date;
            $application1Date->setUser($this);
        }

        return $this;
    }

    public function removeApplication1Date(Application1Date $application1Date): self
    {
        if ($this->application1Dates->contains($application1Date)) {
            $this->application1Dates->removeElement($application1Date);
            // set the owning side to null (unless already changed)
            if ($application1Date->getUser() === $this) {
                $application1Date->setUser(null);
            }
        }

        return $this;
    }
}
