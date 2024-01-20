<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity()]
#[Vich\Uploadable()]
class CategoryImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[Vich\UploadableField(mapping: 'categories', fileNameProperty: 'name')]
    private ?File $file;

    #[ORM\Column(type: "string")]
    private ?string $name;

    #[ORM\ManyToOne(targetEntity: "Category", inversedBy: "images")]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category;

    public function getId(): int
    {
        return $this->id;
    }


    public function setFile(?File $file): void
    {
        $this->file = $file;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): void
    {
        $this->category = $category;
    }
}
