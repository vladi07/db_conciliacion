<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210920220416 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE conci_acuerdo_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE conci_acuerdo_materia_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE conci_sacuerdo_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE consi_sacuerdo_materia_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE edad_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE genero_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE idioma_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE instruccion_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE materia_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE reporte_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE sol_materia_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE solicitante_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE conci_acuerdo (id INT NOT NULL, total BIGINT DEFAULT NULL, parcial BIGINT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE conci_acuerdo_materia (id INT NOT NULL, civil BIGINT DEFAULT NULL, comercial BIGINT DEFAULT NULL, familiar BIGINT DEFAULT NULL, vecinal BIGINT DEFAULT NULL, comunitario BIGINT DEFAULT NULL, escolar BIGINT DEFAULT NULL, bancario BIGINT DEFAULT NULL, mercantil BIGINT DEFAULT NULL, municipal BIGINT DEFAULT NULL, penal BIGINT DEFAULT NULL, deportivo BIGINT DEFAULT NULL, disciplinario BIGINT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE conci_sacuerdo (id INT NOT NULL, abandono BIGINT DEFAULT NULL, inasistencia BIGINT DEFAULT NULL, no_acuerdo BIGINT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE consi_sacuerdo_materia (id INT NOT NULL, civil BIGINT DEFAULT NULL, comercial BIGINT DEFAULT NULL, familiar BIGINT DEFAULT NULL, vecinal BIGINT DEFAULT NULL, comunitario BIGINT DEFAULT NULL, escolar BIGINT DEFAULT NULL, bancario BIGINT DEFAULT NULL, mercantil BIGINT DEFAULT NULL, municipal BIGINT DEFAULT NULL, penal BIGINT DEFAULT NULL, deportivo BIGINT DEFAULT NULL, disciplinario BIGINT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE edad (id INT NOT NULL, reporte_id INT NOT NULL, menor BIGINT DEFAULT NULL, joven BIGINT DEFAULT NULL, adulto BIGINT DEFAULT NULL, joven_adulto BIGINT DEFAULT NULL, mayor BIGINT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_545B447692CA572 ON edad (reporte_id)');
        $this->addSql('CREATE TABLE genero (id INT NOT NULL, reporte_id INT NOT NULL, masculino BIGINT DEFAULT NULL, femenino BIGINT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A000883A92CA572 ON genero (reporte_id)');
        $this->addSql('CREATE TABLE idioma (id INT NOT NULL, reporte_id INT NOT NULL, castellano BIGINT DEFAULT NULL, aymara BIGINT DEFAULT NULL, quechua BIGINT DEFAULT NULL, otro BIGINT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1DC85E0C92CA572 ON idioma (reporte_id)');
        $this->addSql('CREATE TABLE instruccion (id INT NOT NULL, reporte_id INT NOT NULL, primaria BIGINT DEFAULT NULL, secundaria BIGINT DEFAULT NULL, tecnico BIGINT DEFAULT NULL, licenciatura BIGINT DEFAULT NULL, postgrado BIGINT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B6748E7092CA572 ON instruccion (reporte_id)');
        $this->addSql('CREATE TABLE materia (id INT NOT NULL, civil BIGINT DEFAULT NULL, comercial BIGINT DEFAULT NULL, familiar BIGINT DEFAULT NULL, vecinal BIGINT DEFAULT NULL, comunitario BIGINT DEFAULT NULL, escolar BIGINT DEFAULT NULL, bancario BIGINT DEFAULT NULL, mercantil BIGINT DEFAULT NULL, municipal BIGINT DEFAULT NULL, penal BIGINT DEFAULT NULL, deportivo BIGINT DEFAULT NULL, disciplinario BIGINT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE reporte (id INT NOT NULL, acta BIGINT NOT NULL, virtual BIGINT DEFAULT NULL, file_reporte VARCHAR(254) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE sol_materia (id INT NOT NULL, civil BIGINT DEFAULT NULL, comercial BIGINT DEFAULT NULL, familiar BIGINT DEFAULT NULL, vecinal BIGINT DEFAULT NULL, comunitario BIGINT DEFAULT NULL, escolar BIGINT DEFAULT NULL, bancario BIGINT DEFAULT NULL, mercantil BIGINT DEFAULT NULL, municipal BIGINT DEFAULT NULL, penal BIGINT DEFAULT NULL, deportivo BIGINT DEFAULT NULL, disciplinario BIGINT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE solicitante (id INT NOT NULL, reporte_id INT NOT NULL, p_natural BIGINT DEFAULT NULL, p_juridica BIGINT DEFAULT NULL, p_representante BIGINT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_77F7024F92CA572 ON solicitante (reporte_id)');
        $this->addSql('ALTER TABLE edad ADD CONSTRAINT FK_545B447692CA572 FOREIGN KEY (reporte_id) REFERENCES reporte (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE genero ADD CONSTRAINT FK_A000883A92CA572 FOREIGN KEY (reporte_id) REFERENCES reporte (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE idioma ADD CONSTRAINT FK_1DC85E0C92CA572 FOREIGN KEY (reporte_id) REFERENCES reporte (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE instruccion ADD CONSTRAINT FK_B6748E7092CA572 FOREIGN KEY (reporte_id) REFERENCES reporte (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE solicitante ADD CONSTRAINT FK_77F7024F92CA572 FOREIGN KEY (reporte_id) REFERENCES reporte (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE edad DROP CONSTRAINT FK_545B447692CA572');
        $this->addSql('ALTER TABLE genero DROP CONSTRAINT FK_A000883A92CA572');
        $this->addSql('ALTER TABLE idioma DROP CONSTRAINT FK_1DC85E0C92CA572');
        $this->addSql('ALTER TABLE instruccion DROP CONSTRAINT FK_B6748E7092CA572');
        $this->addSql('ALTER TABLE solicitante DROP CONSTRAINT FK_77F7024F92CA572');
        $this->addSql('DROP SEQUENCE conci_acuerdo_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE conci_acuerdo_materia_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE conci_sacuerdo_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE consi_sacuerdo_materia_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE edad_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE genero_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE idioma_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE instruccion_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE materia_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE reporte_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE sol_materia_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE solicitante_id_seq CASCADE');
        $this->addSql('DROP TABLE conci_acuerdo');
        $this->addSql('DROP TABLE conci_acuerdo_materia');
        $this->addSql('DROP TABLE conci_sacuerdo');
        $this->addSql('DROP TABLE consi_sacuerdo_materia');
        $this->addSql('DROP TABLE edad');
        $this->addSql('DROP TABLE genero');
        $this->addSql('DROP TABLE idioma');
        $this->addSql('DROP TABLE instruccion');
        $this->addSql('DROP TABLE materia');
        $this->addSql('DROP TABLE reporte');
        $this->addSql('DROP TABLE sol_materia');
        $this->addSql('DROP TABLE solicitante');
    }
}
