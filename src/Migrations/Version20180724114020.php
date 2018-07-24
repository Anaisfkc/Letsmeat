<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180724114020 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE profil CHANGE saveurs saveurs LONGTEXT NOT NULL, CHANGE pratiquefood pratiquefood LONGTEXT NOT NULL, CHANGE prescriptionfood prescriptionfood LONGTEXT NOT NULL, CHANGE typefood typefood LONGTEXT NOT NULL, CHANGE recette recette LONGTEXT NOT NULL, CHANGE intolerance intolerance LONGTEXT NOT NULL, CHANGE score score LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE profil CHANGE saveurs saveurs LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE pratiquefood pratiquefood LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE prescriptionfood prescriptionfood LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE typefood typefood LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE recette recette LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE intolerance intolerance LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE score score LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
