<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $url = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Service::class)]
    private Collection $services;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: SubCategory::class)]
    private Collection $subCategories;

    public function __construct()
    {
        $this->services = new ArrayCollection();
        $this->subCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getSubCategories(): Collection
    {
        return $this->subCategories;
    }

    public function addSubCategory(?SubCategory $subCategory): static
    {
        if (!$this->subCategories->contains($subCategory)) {
            $this->subCategories->add($subCategory);
            $subCategory->setCategory($this);
        }

        return $this;
    }

    public function removeSubCategory(?SubCategory $subCategory): static
    {
        if ($this->subCategories->contains($subCategory)) {
            $this->subCategories->removeElement($subCategory);
            $subCategory->setCategory(null);
        }

        return $this;
    }

    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(?Service $service): static
    {
        if (!$this->services->contains($service)) {
            $this->services->add($service);
            $service->setCategory($this);
        }

        return $this;
    }

    public function removeService(?Service $service): static
    {
        if ($this->services->contains($service)) {
            $this->services->removeElement($service);
            $service->setCategory(null);
        }

        return $this;
    }
}
