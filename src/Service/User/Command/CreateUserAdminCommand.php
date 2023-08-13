<?php

declare(strict_types=1);

namespace App\Service\User\Command;

use App\Service\User\Factory\UserFactory;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:create-admin')]
class CreateUserAdminCommand extends Command
{
    public function __construct(
        private readonly UserFactory $userFactory,
        private ManagerRegistry $doctrine,
    )
    {
        parent::__construct();
    }

    protected function configure()
    {
        parent::configure();

        $this
            ->addArgument('email', InputArgument::REQUIRED, 'Email of user')
            ->addArgument('password', InputArgument::REQUIRED, 'Password of user')
        ;

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Create Admin',
            '============',
        ]);

        try {
            $entityManager = $this->doctrine->getManager();
            $admin = $this->userFactory->createAdmin($input->getArgument('email'), $input->getArgument('password'));

            $entityManager->persist($admin);
            $entityManager->flush();
        } catch (\Exception $e) {
            $output->writeln([
                '============',
                $e->getMessage(),
                "Admin can't be created"
            ]);

            return Command::FAILURE;
        }

        $output->writeln([
            '============',
            'Admin Created'
        ]);

        return Command::SUCCESS;
    }
}