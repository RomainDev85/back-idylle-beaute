<?php

namespace App\Controller\Admin;

use App\Core\Service\Enum\ServiceDuration;
use App\Entity\SubService;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Contracts\Translation\TranslatorInterface;

class SubServiceCrudController extends AbstractCrudController
{
    public function __construct(
        private TranslatorInterface $translator,
    )
    {
    }

    public static function getEntityFqcn(): string
    {
        return SubService::class;
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
            AssociationField::new('subCategory', $this->translator->trans('app.ui.admin.sub_category.label'))
                ->setRequired(true),
            ChoiceField::new('duration')
                ->setLabel($this->translator->trans('app.ui.admin.duration'))
                ->setChoices(ServiceDuration::DURATIONS),
            IntegerField::new('price')
                ->setLabel($this->translator->trans('app.ui.admin.price')),
            ImageField::new('image')
                ->setBasePath('upload/images/sub-service')
                ->setUploadDir('public/upload/images/sub-service')
        ];
    }

}
