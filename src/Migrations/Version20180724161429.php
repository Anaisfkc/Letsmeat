<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180724161429 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE profil ADD sale TINYINT(1) DEFAULT NULL, ADD sucre TINYINT(1) DEFAULT NULL, ADD amer TINYINT(1) DEFAULT NULL, ADD acide TINYINT(1) DEFAULT NULL, ADD epice TINYINT(1) DEFAULT NULL, ADD sucresale TINYINT(1) DEFAULT NULL, ADD vegetalien TINYINT(1) DEFAULT NULL, ADD vegetarien TINYINT(1) DEFAULT NULL, ADD omnivore TINYINT(1) DEFAULT NULL, ADD carnivore TINYINT(1) DEFAULT NULL, ADD halal TINYINT(1) DEFAULT NULL, ADD cacher TINYINT(1) DEFAULT NULL, ADD autre TINYINT(1) DEFAULT NULL, ADD fastfood TINYINT(1) DEFAULT NULL, ADD slowfood TINYINT(1) DEFAULT NULL, ADD bourguignon TINYINT(1) DEFAULT NULL, ADD paella TINYINT(1) DEFAULT NULL, ADD nouille TINYINT(1) DEFAULT NULL, ADD tiepboudien TINYINT(1) DEFAULT NULL, ADD macncheese TINYINT(1) DEFAULT NULL, ADD tajine TINYINT(1) DEFAULT NULL, ADD pouletcurry TINYINT(1) DEFAULT NULL, ADD gluten TINYINT(1) DEFAULT NULL, ADD fruitsdemer TINYINT(1) DEFAULT NULL, ADD oeuf TINYINT(1) DEFAULT NULL, ADD arachide TINYINT(1) DEFAULT NULL, ADD soja TINYINT(1) DEFAULT NULL, ADD lait TINYINT(1) DEFAULT NULL, ADD fruitsacoques TINYINT(1) DEFAULT NULL, ADD autreintolerance TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE profil DROP sale, DROP sucre, DROP amer, DROP acide, DROP epice, DROP sucresale, DROP vegetalien, DROP vegetarien, DROP omnivore, DROP carnivore, DROP halal, DROP cacher, DROP autre, DROP fastfood, DROP slowfood, DROP bourguignon, DROP paella, DROP nouille, DROP tiepboudien, DROP macncheese, DROP tajine, DROP pouletcurry, DROP gluten, DROP fruitsdemer, DROP oeuf, DROP arachide, DROP soja, DROP lait, DROP fruitsacoques, DROP autreintolerance');
    }
}
