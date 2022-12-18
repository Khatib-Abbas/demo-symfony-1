<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221218153455 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE program_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE program_schedule_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE program (id INT NOT NULL, name VARCHAR(255) NOT NULL, summary TEXT DEFAULT NULL, duration SMALLINT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE program_schedule (id INT NOT NULL, program_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DB0DEDCE3EB8070A ON program_schedule (program_id)');
        $this->addSql('ALTER TABLE program_schedule ADD CONSTRAINT FK_DB0DEDCE3EB8070A FOREIGN KEY (program_id) REFERENCES program (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE program_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE program_schedule_id_seq CASCADE');
        $this->addSql('ALTER TABLE program_schedule DROP CONSTRAINT FK_DB0DEDCE3EB8070A');
        $this->addSql('DROP TABLE program');
        $this->addSql('DROP TABLE program_schedule');
    }
}
