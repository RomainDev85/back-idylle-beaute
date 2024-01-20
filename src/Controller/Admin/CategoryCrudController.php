<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Form\Type\CategoryImageType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Contracts\Translation\TranslatorInterface;

class CategoryCrudController extends AbstractCrudController
{
    public function __construct(
        private TranslatorInterface $translator,
    )
    {
    }

    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name')
                ->setLabel($this->translator->trans('app.ui.admin.name')),
            TextField::new('url')->hideOnForm(),
            TextareaField::new('description')
                ->setLabel('Description')
                ->setRequired(false),
            CollectionField::new('images')
                ->setEntryType(CategoryImageType::class)
        ];
    }
}
