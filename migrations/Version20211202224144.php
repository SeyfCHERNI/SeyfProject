<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211202224144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE offresgroupes');
        $this->addSql('DROP TABLE offresindividuel');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offresgroupes (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, offresgroupes_id INTEGER NOT NULL, descriptif_groupes VARCHAR(255) NOT NULL COLLATE BINARY, date_expiration DATE NOT NULL, prix_groupes VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('CREATE INDEX IDX_556162E0A2DD4D2E ON offresgroupes (offresgroupes_id)');
        $this->addSql('CREATE TABLE offresindividuel (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, descriptif_individuel VARCHAR(255) NOT NULL COLLATE BINARY, expiration DATE NOT NULL, prix_individuel VARCHAR(255) NOT NULL COLLATE BINARY)');
    }
}
