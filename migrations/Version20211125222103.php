<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211125222103 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offrespar (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, descriptif_offreindiv VARCHAR(255) NOT NULL, validitã© VARCHAR(255) NOT NULL, prix_offreindiv VARCHAR(255) NOT NULL)');
        $this->addSql('DROP TABLE offrdiv');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offrdiv (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, descriptif_offreindiv VARCHAR(255) NOT NULL COLLATE BINARY, validitã© VARCHAR(255) NOT NULL COLLATE BINARY, prix_offreindiv VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('DROP TABLE offrespar');
    }
}
