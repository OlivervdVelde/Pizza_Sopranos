<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220413132415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pizza ADD tonijn_id INT NOT NULL');
        $this->addSql('ALTER TABLE pizza ADD CONSTRAINT FK_CFDD826F2784AEB4 FOREIGN KEY (tonijn_id) REFERENCES pizza (id)');
        $this->addSql('CREATE INDEX IDX_CFDD826F2784AEB4 ON pizza (tonijn_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pizza DROP FOREIGN KEY FK_CFDD826F2784AEB4');
        $this->addSql('DROP INDEX IDX_CFDD826F2784AEB4 ON pizza');
        $this->addSql('ALTER TABLE pizza DROP tonijn_id');
    }
}
