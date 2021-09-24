<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210915221330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE centro_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE departamento_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE localidad_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE centro (id INT NOT NULL, dpto_id INT NOT NULL, matricula VARCHAR(50) NOT NULL, resolucion VARCHAR(50) DEFAULT NULL, inicio_vigencia DATE NOT NULL, fin_vigencia DATE NOT NULL, nombre_centro VARCHAR(250) NOT NULL, representante VARCHAR(250) NOT NULL, cargo VARCHAR(250) NOT NULL, zona VARCHAR(250) DEFAULT NULL, direccion VARCHAR(254) NOT NULL, telefono BIGINT DEFAULT NULL, fax BIGINT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2675036B1FA00731 ON centro (dpto_id)');
        $this->addSql('CREATE TABLE departamento (id INT NOT NULL, nombre VARCHAR(150) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE localidad (id INT NOT NULL, dpto_id INT DEFAULT NULL, nombre VARCHAR(200) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4F68E0101FA00731 ON localidad (dpto_id)');
        $this->addSql('ALTER TABLE centro ADD CONSTRAINT FK_2675036B1FA00731 FOREIGN KEY (dpto_id) REFERENCES departamento (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE localidad ADD CONSTRAINT FK_4F68E0101FA00731 FOREIGN KEY (dpto_id) REFERENCES departamento (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE centro DROP CONSTRAINT FK_2675036B1FA00731');
        $this->addSql('ALTER TABLE localidad DROP CONSTRAINT FK_4F68E0101FA00731');
        $this->addSql('DROP SEQUENCE centro_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE departamento_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE localidad_id_seq CASCADE');
        $this->addSql('DROP TABLE centro');
        $this->addSql('DROP TABLE departamento');
        $this->addSql('DROP TABLE localidad');
    }
}