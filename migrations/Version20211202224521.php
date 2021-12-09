<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211202224521 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offresindividuel (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, descriptif_individuel VARCHAR(255) NOT NULL, expiration DATE NOT NULL, prix_individuel VARCHAR(255) NOT NULL)');
        $this->addSql('DROP INDEX IDX_556162E0A2DD4D2E');
        $this->addSql('CREATE TEMPORARY TABLE __temp__offresgroupes AS SELECT id, offresgroupes_id, descriptif_groupes, date_expiration, prix_groupes FROM offresgroupes');
        $this->addSql('DROP TABLE offresgroupes');
        $this->addSql('CREATE TABLE offresgroupes (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, offresgroupes_id INTEGER DEFAULT NULL, descriptif_groupes VARCHAR(255) NOT NULL COLLATE BINARY, date_expiration DATE NOT NULL, prix_groupes VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_556162E0A2DD4D2E FOREIGN KEY (offresgroupes_id) REFERENCES offres (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO offresgroupes (id, offresgroupes_id, descriptif_groupes, date_expiration, prix_groupes) SELECT id, offresgroupes_id, descriptif_groupes, date_expiration, prix_groupes FROM __temp__offresgroupes');
        $this->addSql('DROP TABLE __temp__offresgroupes');
        $this->addSql('CREATE INDEX IDX_556162E0A2DD4D2E ON offresgroupes (offresgroupes_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE offresindividuel');
        $this->addSql('DROP INDEX IDX_556162E0A2DD4D2E');
        $this->addSql('CREATE TEMPORARY TABLE __temp__offresgroupes AS SELECT id, offresgroupes_id, descriptif_groupes, date_expiration, prix_groupes FROM offresgroupes');
        $this->addSql('DROP TABLE offresgroupes');
        $this->addSql('CREATE TABLE offresgroupes (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, offresgroupes_id INTEGER DEFAULT NULL, descriptif_groupes VARCHAR(255) NOT NULL, date_expiration DATE NOT NULL, prix_groupes VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO offresgroupes (id, offresgroupes_id, descriptif_groupes, date_expiration, prix_groupes) SELECT id, offresgroupes_id, descriptif_groupes, date_expiration, prix_groupes FROM __temp__offresgroupes');
        $this->addSql('DROP TABLE __temp__offresgroupes');
        $this->addSql('CREATE INDEX IDX_556162E0A2DD4D2E ON offresgroupes (offresgroupes_id)');
    }
}
