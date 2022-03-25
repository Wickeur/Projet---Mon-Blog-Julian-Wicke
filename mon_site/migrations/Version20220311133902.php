<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220311133902 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, nom_commentaire VARCHAR(255) NOT NULL, prenom_commentaire VARCHAR(255) NOT NULL, email_commentaire VARCHAR(255) NOT NULL, contenu_commentaire LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, nom_competence VARCHAR(255) NOT NULL, type_competence VARCHAR(255) DEFAULT NULL, image_competence LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id_experience INT AUTO_INCREMENT NOT NULL, nom_poste VARCHAR(255) NOT NULL, type_poste VARCHAR(255) NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, lieu_entreprise VARCHAR(255) NOT NULL, date_debut_exp DATE NOT NULL, date_fin_exp DATE DEFAULT NULL, descriptif_exp LONGTEXT DEFAULT NULL, PRIMARY KEY(id_experience)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id_formation INT AUTO_INCREMENT NOT NULL, nom_ecole VARCHAR(255) NOT NULL, nom_diplome VARCHAR(255) NOT NULL, nom_domaine VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE DEFAULT NULL, resultat VARCHAR(255) NOT NULL, PRIMARY KEY(id_formation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loisirs (id INT AUTO_INCREMENT NOT NULL, image_loisirs LONGTEXT DEFAULT NULL, nom_loisirs VARCHAR(255) NOT NULL, description_loisirs LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (projet_id INT AUTO_INCREMENT NOT NULL, projet_name VARCHAR(255) NOT NULL, projet_descriptif LONGTEXT DEFAULT NULL, annee_projet VARCHAR(255) DEFAULT NULL, image_projet LONGTEXT DEFAULT NULL, PRIMARY KEY(projet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE loisirs');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE user');
    }
}
