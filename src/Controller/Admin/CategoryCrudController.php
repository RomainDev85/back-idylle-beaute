<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
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
            ImageField::new('image')
                ->setBasePath('upload/images/category')
                ->setUploadDir('public/upload/images/category')
        ];
    }
}
