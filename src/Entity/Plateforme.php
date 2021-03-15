<?php

namespace App\Entity;

use App\Repository\PlateformeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlateformeRepository::class)
 */
class Plateforme
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $console;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @ORM\ManyToMany(targetEntity=Jeuxvideo::class, mappedBy="plateforme")
     */
    private $jeuxvideos;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="plateforme")
     */
    private $users;

    public function __construct()
    {
        $this->jeuxvideos = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConsole(): ?string
    {
        return $this->console;
    }

    public function setConsole(string $console): self
    {
        $this->console = $console;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return Collection|Jeuxvideo[]
     */
    public function getJeuxvideos(): Collection
    {
        return $this->jeuxvideos;
    }

    public function addJeuxvideo(Jeuxvideo $jeuxvideo): self
    {
        if (!$this->jeuxvideos->contains($jeuxvideo)) {
            $this->jeuxvideos[] = $jeuxvideo;
            $jeuxvideo->addPlateforme($this);
        }

        return $this;
    }

    public function removeJeuxvideo(Jeuxvideo $jeuxvideo): self
    {
        if ($this->jeuxvideos->removeElement($jeuxvideo)) {
            $jeuxvideo->removePlateforme($this);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addPlateforme($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removePlateforme($this);
        }

        return $this;
    }
}
