<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230118093932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668F347EFB');
        $this->addSql('DROP INDEX IDX_3AF34668F347EFB ON categories');
        $this->addSql('ALTER TABLE categories DROP produit_id');
        $this->addSql('ALTER TABLE commande ADD statut_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DF6203804 FOREIGN KEY (statut_id) REFERENCES statut (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DF6203804 ON commande (statut_id)');
        $this->addSql('ALTER TABLE produit ADD categories_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27A21214B7 ON produit (categories_id)');
        $this->addSql('ALTER TABLE statut DROP FOREIGN KEY FK_E564F0BF82EA2E54');
        $this->addSql('DROP INDEX IDX_E564F0BF82EA2E54 ON statut');
        $this->addSql('ALTER TABLE statut DROP commande_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories ADD produit_id INT NOT NULL');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF34668F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_3AF34668F347EFB ON categories (produit_id)');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DF6203804');
        $this->addSql('DROP INDEX IDX_6EEAA67DF6203804 ON commande');
        $this->addSql('ALTER TABLE commande DROP statut_id');
        $this->addSql('ALTER TABLE `produit` DROP FOREIGN KEY FK_29A5EC27A21214B7');
        $this->addSql('DROP INDEX IDX_29A5EC27A21214B7 ON `produit`');
        $this->addSql('ALTER TABLE `produit` DROP categories_id');
        $this->addSql('ALTER TABLE statut ADD commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE statut ADD CONSTRAINT FK_E564F0BF82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('CREATE INDEX IDX_E564F0BF82EA2E54 ON statut (commande_id)');
    }
}
