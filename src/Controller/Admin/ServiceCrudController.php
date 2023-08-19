<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use App\Enum\Service\ServiceDuration;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Contracts\Translation\TranslatorInterface;

class ServiceCrudController extends AbstractCrudController
{
    public function __construct(
        private TranslatorInterface $translator,
    )
    {
    }

    public static function getEntityFqcn(): string
    {
        return Service::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name')
                ->setLabel($this->translator->trans('app.ui.admin.name'))
                ->setRequired(true),
            TextareaField::new('description')
                ->setLabel('Description'),
            AssociationField::new('category')
                ->setLabel($this->translator->trans('app.ui.admin.category.label'))
                ->setRequired(true),
            IntegerField::new('price')
                ->setLabel($this->translator->trans('app.ui.admin.price'))
                ->setRequired(true),
            ChoiceField::new('duration')
                ->setLabel($this->translator->trans('app.ui.admin.duration'))
                ->setChoices(ServiceDuration::DURATIONS),
            ImageField::new('image')
                ->setLabel('Image')
                ->setBasePath('upload/images/service')
                ->setUploadDir('public/upload/images/service'),
        ];
    }
}
