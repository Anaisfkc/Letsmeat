<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180724090818 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, saveurs LONGTEXT NOT NULL, pratiquefood LONGTEXT NOT NULL , prescriptionfood LONGTEXT NOT NULL , typefood LONGTEXT NOT NULL , recette LONGTEXT NOT NULL , intolerance LONGTEXT NOT NULL , score TINYTEXT DEFAULT NULL , UNIQUE INDEX UNIQ_E6D6B297A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proposition (id INT AUTO_INCREMENT NOT NULL, profil_id INT NOT NULL, user_id INT NOT NULL, titre VARCHAR(100) NOT NULL, contenu LONGTEXT NOT NULL, datetime DATETIME NOT NULL, nbdispo VARCHAR(30) NOT NULL, INDEX IDX_C7CDC353275ED078 (profil_id), INDEX IDX_C7CDC353A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, profil_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_42C84955275ED078 (profil_id), INDEX IDX_42C84955A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_proposition (reservation_id INT NOT NULL, proposition_id INT NOT NULL, INDEX IDX_BA11E0FB83297E7 (reservation_id), INDEX IDX_BA11E0FDB96F9E (proposition_id), PRIMARY KEY(reservation_id, proposition_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(100) NOT NULL, nom VARCHAR(100) NOT NULL, genre VARCHAR(1) NOT NULL, datenaissance DATE NOT NULL, pseudo VARCHAR(100) NOT NULL, email VARCHAR(250) NOT NULL, mdp VARCHAR(20) NOT NULL, mdpconfirm VARCHAR(20) NOT NULL, phone VARCHAR(20) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(100) NOT NULL, cp VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B297A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE proposition ADD CONSTRAINT FK_C7CDC353275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE proposition ADD CONSTRAINT FK_C7CDC353A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation_proposition ADD CONSTRAINT FK_BA11E0FB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_proposition ADD CONSTRAINT FK_BA11E0FDB96F9E FOREIGN KEY (proposition_id) REFERENCES proposition (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE proposition DROP FOREIGN KEY FK_C7CDC353275ED078');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955275ED078');
        $this->addSql('ALTER TABLE reservation_proposition DROP FOREIGN KEY FK_BA11E0FDB96F9E');
        $this->addSql('ALTER TABLE reservation_proposition DROP FOREIGN KEY FK_BA11E0FB83297E7');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B297A76ED395');
        $this->addSql('ALTER TABLE proposition DROP FOREIGN KEY FK_C7CDC353A76ED395');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A76ED395');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE proposition');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE reservation_proposition');
        $this->addSql('DROP TABLE user');
    }
}
