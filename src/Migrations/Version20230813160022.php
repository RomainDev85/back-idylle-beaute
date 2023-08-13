<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230813160022 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1ED5CA9E6');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1F7BFE87C');
        $this->addSql('DROP INDEX IDX_64C19C1ED5CA9E6 ON category');
        $this->addSql('DROP INDEX IDX_64C19C1F7BFE87C ON category');
        $this->addSql('ALTER TABLE category DROP service_id, DROP sub_category_id');
        $this->addSql('ALTER TABLE service ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD212469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD212469DE2 ON service (category_id)');
        $this->addSql('ALTER TABLE sub_category DROP FOREIGN KEY FK_BCE3F798C1973A2B');
        $this->addSql('DROP INDEX IDX_BCE3F798C1973A2B ON sub_category');
        $this->addSql('ALTER TABLE sub_category CHANGE sub_service_id category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sub_category ADD CONSTRAINT FK_BCE3F79812469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_BCE3F79812469DE2 ON sub_category (category_id)');
        $this->addSql('ALTER TABLE sub_service ADD sub_category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sub_service ADD CONSTRAINT FK_9E45C626F7BFE87C FOREIGN KEY (sub_category_id) REFERENCES sub_category (id)');
        $this->addSql('CREATE INDEX IDX_9E45C626F7BFE87C ON sub_service (sub_category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category ADD service_id INT DEFAULT NULL, ADD sub_category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1F7BFE87C FOREIGN KEY (sub_category_id) REFERENCES sub_category (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_64C19C1ED5CA9E6 ON category (service_id)');
        $this->addSql('CREATE INDEX IDX_64C19C1F7BFE87C ON category (sub_category_id)');
        $this->addSql('ALTER TABLE sub_service DROP FOREIGN KEY FK_9E45C626F7BFE87C');
        $this->addSql('DROP INDEX IDX_9E45C626F7BFE87C ON sub_service');
        $this->addSql('ALTER TABLE sub_service DROP sub_category_id');
        $this->addSql('ALTER TABLE sub_category DROP FOREIGN KEY FK_BCE3F79812469DE2');
        $this->addSql('DROP INDEX IDX_BCE3F79812469DE2 ON sub_category');
        $this->addSql('ALTER TABLE sub_category CHANGE category_id sub_service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sub_category ADD CONSTRAINT FK_BCE3F798C1973A2B FOREIGN KEY (sub_service_id) REFERENCES sub_service (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_BCE3F798C1973A2B ON sub_category (sub_service_id)');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD212469DE2');
        $this->addSql('DROP INDEX IDX_E19D9AD212469DE2 ON service');
        $this->addSql('ALTER TABLE service DROP category_id');
    }
}
