<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211125223441 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_556162E0B9768317');
        $this->addSql('CREATE TEMPORARY TABLE __temp__offresgroupes AS SELECT id, offgroupes_id, descriptig_offregrp, date_expiration, prix_offregrp FROM offresgroupes');
        $this->addSql('DROP TABLE offresgroupes');
        $this->addSql('CREATE TABLE offresgroupes (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, offgroupes_id INTEGER DEFAULT NULL, descriptig_offregrp VARCHAR(255) NOT NULL COLLATE BINARY, date_expiration VARCHAR(255) NOT NULL COLLATE BINARY, prix_offregrp VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_556162E0B9768317 FOREIGN KEY (offgroupes_id) REFERENCES offres (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO offresgroupes (id, offgroupes_id, descriptig_offregrp, date_expiration, prix_offregrp) SELECT id, offgroupes_id, descriptig_offregrp, date_expiration, prix_offregrp FROM __temp__offresgroupes');
        $this->addSql('DROP TABLE __temp__offresgroupes');
        $this->addSql('CREATE INDEX IDX_556162E0B9768317 ON offresgroupes (offgroupes_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__offrespar AS SELECT id, descriptif_offreindiv, validitã©, prix_offreindiv FROM offrespar');
        $this->addSql('DROP TABLE offrespar');
        $this->addSql('CREATE TABLE offrespar (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, offpart_id INTEGER NOT NULL, descriptif_offreindiv VARCHAR(255) NOT NULL COLLATE BINARY, validitã© VARCHAR(255) NOT NULL COLLATE BINARY, prix_offreindiv VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_639FF31B2B14F20B FOREIGN KEY (offpart_id) REFERENCES offres (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO offrespar (id, descriptif_offreindiv, validitã©, prix_offreindiv) SELECT id, descriptif_offreindiv, validitã©, prix_offreindiv FROM __temp__offrespar');
        $this->addSql('DROP TABLE __temp__offrespar');
        $this->addSql('CREATE INDEX IDX_639FF31B2B14F20B ON offrespar (offpart_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_556162E0B9768317');
        $this->addSql('CREATE TEMPORARY TABLE __temp__offresgroupes AS SELECT id, offgroupes_id, descriptig_offregrp, date_expiration, prix_offregrp FROM offresgroupes');
        $this->addSql('DROP TABLE offresgroupes');
        $this->addSql('CREATE TABLE offresgroupes (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, offgroupes_id INTEGER DEFAULT NULL, descriptig_offregrp VARCHAR(255) NOT NULL, date_expiration VARCHAR(255) NOT NULL, prix_offregrp VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO offresgroupes (id, offgroupes_id, descriptig_offregrp, date_expiration, prix_offregrp) SELECT id, offgroupes_id, descriptig_offregrp, date_expiration, prix_offregrp FROM __temp__offresgroupes');
        $this->addSql('DROP TABLE __temp__offresgroupes');
        $this->addSql('CREATE INDEX IDX_556162E0B9768317 ON offresgroupes (offgroupes_id)');
        $this->addSql('DROP INDEX IDX_639FF31B2B14F20B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__offrespar AS SELECT id, descriptif_offreindiv, validitã©, prix_offreindiv FROM offrespar');
        $this->addSql('DROP TABLE offrespar');
        $this->addSql('CREATE TABLE offrespar (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, descriptif_offreindiv VARCHAR(255) NOT NULL, validitã© VARCHAR(255) NOT NULL, prix_offreindiv VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO offrespar (id, descriptif_offreindiv, validitã©, prix_offreindiv) SELECT id, descriptif_offreindiv, validitã©, prix_offreindiv FROM __temp__offrespar');
        $this->addSql('DROP TABLE __temp__offrespar');
    }
}
