<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190326133446 extends AbstractMigration
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
        $this->addSql('CREATE TABLE authorize_user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, authorize_id_structure_id INTEGER DEFAULT NULL, authorize_login VARCHAR(255) NOT NULL, authorize_password VARCHAR(255) NOT NULL, authorize_created_at DATETIME NOT NULL, authorize_updated_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_9D415A04A15A900A ON authorize_user (authorize_id_structure_id)');
        $this->addSql('CREATE TABLE child (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_parent_id INTEGER NOT NULL, child_name VARCHAR(255) NOT NULL, child_firstname VARCHAR(255) NOT NULL, child_years INTEGER NOT NULL, child_other VARCHAR(255) DEFAULT NULL, child_created_at DATETIME NOT NULL, child_updated_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_22B35429F24F7657 ON child (id_parent_id)');
        $this->addSql('CREATE TABLE disease (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, disease_name VARCHAR(255) NOT NULL, disease_therapy VARCHAR(255) DEFAULT NULL, disease_severity VARCHAR(255) DEFAULT NULL, disease_created_at DATETIME NOT NULL, disease_updated_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE TABLE disease_child (disease_id INTEGER NOT NULL, child_id INTEGER NOT NULL, PRIMARY KEY(disease_id, child_id))');
        $this->addSql('CREATE INDEX IDX_8DCB22D5D8355341 ON disease_child (disease_id)');
        $this->addSql('CREATE INDEX IDX_8DCB22D5DD62C21B ON disease_child (child_id)');
        $this->addSql('CREATE TABLE equipment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, equipment_name VARCHAR(255) NOT NULL, equipment_created_at DATETIME NOT NULL, equipment_updated_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE TABLE equipment_child (equipment_id INTEGER NOT NULL, child_id INTEGER NOT NULL, PRIMARY KEY(equipment_id, child_id))');
        $this->addSql('CREATE INDEX IDX_CBEA75CD517FE9FE ON equipment_child (equipment_id)');
        $this->addSql('CREATE INDEX IDX_CBEA75CDDD62C21B ON equipment_child (child_id)');
        $this->addSql('CREATE TABLE parents (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parents_name VARCHAR(255) NOT NULL, parents_firstname VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, parents_password VARCHAR(300) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL)');
        $this->addSql('CREATE TABLE pivot_pro_child (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, pivot_child_id_id INTEGER NOT NULL, pivot_status VARCHAR(255) NOT NULL, pivot_created_at DATETIME NOT NULL, pivot_updated_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_CF567594C4E9D751 ON pivot_pro_child (pivot_child_id_id)');
        $this->addSql('CREATE TABLE pivot_pro_child_structure (pivot_pro_child_id INTEGER NOT NULL, structure_id INTEGER NOT NULL, PRIMARY KEY(pivot_pro_child_id, structure_id))');
        $this->addSql('CREATE INDEX IDX_F9F52DDD4C1BACA1 ON pivot_pro_child_structure (pivot_pro_child_id)');
        $this->addSql('CREATE INDEX IDX_F9F52DDD2534008B ON pivot_pro_child_structure (structure_id)');
        $this->addSql('CREATE TABLE structure (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, structure_name VARCHAR(255) NOT NULL, structure_location VARCHAR(255) NOT NULL, structure_city VARCHAR(255) NOT NULL, structure_zipcode INTEGER NOT NULL, structure_type VARCHAR(255) NOT NULL, structure_siret INTEGER NOT NULL, structure_numberspace INTEGER NOT NULL, structure_type_alimentation VARCHAR(255) NOT NULL, structure_created_at DATETIME NOT NULL, structure_updated_at DATETIME DEFAULT NULL, strucutre_mail VARCHAR(255) NOT NULL, structure_password VARCHAR(255) NOT NULL, structure_token VARCHAR(255) NOT NULL, structure_status_paiement VARCHAR(255) NOT NULL)');
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
        $this->addSql('DROP TABLE parents');
        $this->addSql('DROP TABLE pivot_pro_child');
        $this->addSql('DROP TABLE pivot_pro_child_structure');
        $this->addSql('DROP TABLE structure');
    }
}
