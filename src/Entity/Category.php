<?php

namespace App\Entity;

use App\Doctrine\ORM\EventListener\CategoryListener;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ORM\EntityListeners([CategoryListener::class])]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description;

//    #[ORM\Column(length: 255, nullable: false)]
//    private ?string $image = null;

    #[ORM\OneToMany(targetEntity: "CategoryImage", mappedBy: "category", cascade: ['persist'], orphanRemoval: true)]
    private Collection $images;


    #[ORM\Column(length: 255, unique: true, nullable: false)]
    private ?string $url;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Service::class, orphanRemoval: true)]
    private Collection $services;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: SubCategory::class, orphanRemoval: true)]
    private Collection $subCategories;

    public function __construct()
    {

        $this->services = new ArrayCollection();
        $this->subCategories = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(CategoryImage $categoryImage): void
    {
        if (!$this->images->contains($categoryImage)) {
            $this->images->add($categoryImage);
            $categoryImage->setCategory($this);
        }
    }

    public function removeImage(CategoryImage $categoryImage): void
    {
        if ($this->images->contains($categoryImage)) {
            $this->images->removeElement($categoryImage);
        }
    }

}
