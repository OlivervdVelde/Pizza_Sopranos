<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220422102132 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, vlees VARCHAR(255) NOT NULL, vis VARCHAR(255) NOT NULL, vegetarisch VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pizza DROP FOREIGN KEY FK_CFDD826F2784AEB4');
        $this->addSql('DROP INDEX idx_cfdd826f2784aeb4 ON pizza');
        $this->addSql('CREATE INDEX IDX_CFDD826F12469DE2 ON pizza (category_id)');
        $this->addSql('ALTER TABLE pizza ADD CONSTRAINT FK_CFDD826F2784AEB4 FOREIGN KEY (category_id) REFERENCES pizza (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE category');
        $this->addSql('ALTER TABLE pizza DROP FOREIGN KEY FK_CFDD826F12469DE2');
        $this->addSql('DROP INDEX idx_cfdd826f12469de2 ON pizza');
        $this->addSql('CREATE INDEX IDX_CFDD826F2784AEB4 ON pizza (category_id)');
        $this->addSql('ALTER TABLE pizza ADD CONSTRAINT FK_CFDD826F12469DE2 FOREIGN KEY (category_id) REFERENCES pizza (id)');
    }
}
