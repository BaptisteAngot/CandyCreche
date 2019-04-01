<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190328142524 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE allergy (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, allergy_name VARCHAR(255) NOT NULL, allergy_therapy VARCHAR(255) DEFAULT NULL, allergy_severity VARCHAR(255) DEFAULT NULL, allergy_created_at DATETIME NOT NULL, allergy_updated_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE TABLE allergy_child (allergy_id INTEGER NOT NULL, child_id INTEGER NOT NULL, PRIMARY KEY(allergy_id, child_id))');
        $this->addSql('CREATE INDEX IDX_F88B6104DBFD579D ON allergy_child (allergy_id)');
        $this->addSql('CREATE INDEX IDX_F88B6104DD62C21B ON allergy_child (child_id)');
        $this->addSql('CREATE TABLE authorize_user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, authorize_login VARCHAR(255) NOT NULL, authorize_password VARCHAR(255) NOT NULL, authorize_created_at DATETIME NOT NULL, authorize_updated_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE TABLE child (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, child_id_parent_id INTEGER NOT NULL, child_name VARCHAR(255) NOT NULL, child_firstname VARCHAR(255) NOT NULL, child_years INTEGER NOT NULL, child_others VARCHAR(255) DEFAULT NULL, child_created_at DATETIME NOT NULL, child_updated_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_22B354292E43FFFF ON child (child_id_parent_id)');
        $this->addSql('CREATE TABLE disease (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, disease_name VARCHAR(255) NOT NULL, disease_therapy VARCHAR(255) DEFAULT NULL, disease_severity VARCHAR(255) DEFAULT NULL, disease_created_at DATETIME NOT NULL, disease_updated_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE TABLE disease_child (disease_id INTEGER NOT NULL, child_id INTEGER NOT NULL, PRIMARY KEY(disease_id, child_id))');
        $this->addSql('CREATE INDEX IDX_8DCB22D5D8355341 ON disease_child (disease_id)');
        $this->addSql('CREATE INDEX IDX_8DCB22D5DD62C21B ON disease_child (child_id)');
        $this->addSql('CREATE TABLE equipment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, equipment_name VARCHAR(255) NOT NULL, equipment_created_at DATETIME NOT NULL, equipment_updated_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE TABLE equipment_child (equipment_id INTEGER NOT NULL, child_id INTEGER NOT NULL, PRIMARY KEY(equipment_id, child_id))');
        $this->addSql('CREATE INDEX IDX_CBEA75CD517FE9FE ON equipment_child (equipment_id)');
        $this->addSql('CREATE INDEX IDX_CBEA75CDDD62C21B ON equipment_child (child_id)');
        $this->addSql('CREATE TABLE opinion (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, opinion_id_parents_id INTEGER DEFAULT NULL, opinion_id_structure_id INTEGER DEFAULT NULL, opinion_created_at DATETIME NOT NULL, opinion_updated_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_AB02B0278C01CF99 ON opinion (opinion_id_parents_id)');
        $this->addSql('CREATE INDEX IDX_AB02B02767B559B ON opinion (opinion_id_structure_id)');
        $this->addSql('CREATE TABLE parents (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parents_name VARCHAR(255) NOT NULL, parents_firstname VARCHAR(255) NOT NULL, parents_mail VARCHAR(255) NOT NULL, parents_password VARCHAR(255) NOT NULL, parents_created_at DATETIME NOT NULL, parents_updated_at DATETIME DEFAULT NULL, parents_token VARCHAR(255) NOT NULL, parents_photo VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE pivot_child_structure (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, pivot_id_child_id INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_723B76D96512C51B ON pivot_child_structure (pivot_id_child_id)');
        $this->addSql('CREATE TABLE pivot_child_structure_structure (pivot_child_structure_id INTEGER NOT NULL, structure_id INTEGER NOT NULL, PRIMARY KEY(pivot_child_structure_id, structure_id))');
        $this->addSql('CREATE INDEX IDX_A17006022C77FCA9 ON pivot_child_structure_structure (pivot_child_structure_id)');
        $this->addSql('CREATE INDEX IDX_A17006022534008B ON pivot_child_structure_structure (structure_id)');
        $this->addSql('CREATE TABLE structure (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, structure_name VARCHAR(255) NOT NULL, structure_location VARCHAR(255) NOT NULL, structure_city VARCHAR(255) NOT NULL, structure_zipcode INTEGER NOT NULL, structure_phone INTEGER NOT NULL, structure_type VARCHAR(255) NOT NULL, structure_siret INTEGER NOT NULL, structure_nbspace INTEGER NOT NULL, structure_typefood VARCHAR(255) NOT NULL, structure_mail VARCHAR(255) NOT NULL, structure_password VARCHAR(255) NOT NULL, structure_token VARCHAR(255) NOT NULL, structure_created_at DATETIME NOT NULL, structure_updated_at DATETIME DEFAULT NULL, structure_statuspaiement VARCHAR(255) NOT NULL, structure_photo VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE allergy');
        $this->addSql('DROP TABLE allergy_child');
        $this->addSql('DROP TABLE authorize_user');
        $this->addSql('DROP TABLE child');
        $this->addSql('DROP TABLE disease');
        $this->addSql('DROP TABLE disease_child');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE equipment_child');
        $this->addSql('DROP TABLE opinion');
        $this->addSql('DROP TABLE parents');
        $this->addSql('DROP TABLE pivot_child_structure');
        $this->addSql('DROP TABLE pivot_child_structure_structure');
        $this->addSql('DROP TABLE structure');
    }
}
