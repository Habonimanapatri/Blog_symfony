<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250416132759 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE Article (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(50) NOT NULL, content CLOB NOT NULL, createdAt DATETIME NOT NULL)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE User (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(50) NOT NULL, password VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE Article
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE User
        SQL);
    }
}
