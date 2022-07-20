<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220718152928 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE type_de_service (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE services ADD type_de_service_id INT NOT NULL');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E169E4B2B215 FOREIGN KEY (type_de_service_id) REFERENCES services (id)');
        $this->addSql('CREATE INDEX IDX_7332E169E4B2B215 ON services (type_de_service_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE type_de_service');
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E169E4B2B215');
        $this->addSql('DROP INDEX IDX_7332E169E4B2B215 ON services');
        $this->addSql('ALTER TABLE services DROP type_de_service_id');
    }
}
