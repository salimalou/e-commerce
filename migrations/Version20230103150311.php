<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230103150311 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `adresse` (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, numero_rue INT NOT NULL, code_postal INT NOT NULL, ville VARCHAR(180) NOT NULL, type LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_C35F081643C3D9C3 (ville), INDEX IDX_C35F0816A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `adresse` ADD CONSTRAINT FK_C35F0816A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE produit ADD actif TINYINT(1) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD update_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `adresse` DROP FOREIGN KEY FK_C35F0816A76ED395');
        $this->addSql('DROP TABLE `adresse`');
        $this->addSql('ALTER TABLE `produit` DROP actif, DROP created_at, DROP update_at');
    }
}
