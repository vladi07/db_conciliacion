<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210922204016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE solicitud_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE solicitud (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE materia ADD solicitud_id INT NOT NULL');
        $this->addSql('ALTER TABLE materia ADD conci_sacuerdo_id INT NOT NULL');
        $this->addSql('ALTER TABLE materia ADD conci_acuerdo_id INT NOT NULL');
        $this->addSql('ALTER TABLE materia ADD CONSTRAINT FK_6DF052841CB9D6E4 FOREIGN KEY (solicitud_id) REFERENCES solicitud (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE materia ADD CONSTRAINT FK_6DF05284176B697E FOREIGN KEY (conci_sacuerdo_id) REFERENCES conci_sacuerdo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE materia ADD CONSTRAINT FK_6DF05284F6AE4FB5 FOREIGN KEY (conci_acuerdo_id) REFERENCES conci_acuerdo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_6DF052841CB9D6E4 ON materia (solicitud_id)');
        $this->addSql('CREATE INDEX IDX_6DF05284176B697E ON materia (conci_sacuerdo_id)');
        $this->addSql('CREATE INDEX IDX_6DF05284F6AE4FB5 ON materia (conci_acuerdo_id)');
        $this->addSql('ALTER TABLE reporte ADD centro_id INT NOT NULL');
        $this->addSql('ALTER TABLE reporte ADD CONSTRAINT FK_5CB1214298137A7 FOREIGN KEY (centro_id) REFERENCES centro (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_5CB1214298137A7 ON reporte (centro_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE materia DROP CONSTRAINT FK_6DF052841CB9D6E4');
        $this->addSql('DROP SEQUENCE solicitud_id_seq CASCADE');
        $this->addSql('DROP TABLE solicitud');
        $this->addSql('ALTER TABLE materia DROP CONSTRAINT FK_6DF05284176B697E');
        $this->addSql('ALTER TABLE materia DROP CONSTRAINT FK_6DF05284F6AE4FB5');
        $this->addSql('DROP INDEX IDX_6DF052841CB9D6E4');
        $this->addSql('DROP INDEX IDX_6DF05284176B697E');
        $this->addSql('DROP INDEX IDX_6DF05284F6AE4FB5');
        $this->addSql('ALTER TABLE materia DROP solicitud_id');
        $this->addSql('ALTER TABLE materia DROP conci_sacuerdo_id');
        $this->addSql('ALTER TABLE materia DROP conci_acuerdo_id');
        $this->addSql('ALTER TABLE reporte DROP CONSTRAINT FK_5CB1214298137A7');
        $this->addSql('DROP INDEX IDX_5CB1214298137A7');
        $this->addSql('ALTER TABLE reporte DROP centro_id');
    }
}
