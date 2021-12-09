<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211202175042 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE offresgroupes');
        $this->addSql('DROP TABLE offrespar');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offresgroupes (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, offgroupes_id INTEGER DEFAULT NULL, descriptig_offregrp VARCHAR(255) NOT NULL COLLATE BINARY, date_expiration VARCHAR(255) NOT NULL COLLATE BINARY, prix_offregrp VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('CREATE INDEX IDX_556162E0B9768317 ON offresgroupes (offgroupes_id)');
        $this->addSql('CREATE TABLE offrespar (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, offpart_id INTEGER NOT NULL, descriptif_offreindiv VARCHAR(255) NOT NULL COLLATE BINARY, validitã© VARCHAR(255) NOT NULL COLLATE BINARY, prix_offreindiv VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('CREATE INDEX IDX_639FF31B2B14F20B ON offrespar (offpart_id)');
    }
}
