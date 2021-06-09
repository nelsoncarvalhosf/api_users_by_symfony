<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210609151932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, address_id INTEGER DEFAULT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_8D93D649F5B7AF75 ON user (address_id)');
        $this->addSql('CREATE TABLE user_user_contact_phone (user_id INTEGER NOT NULL, phonenumber_id INTEGER NOT NULL, PRIMARY KEY(user_id, phonenumber_id))');
        $this->addSql('CREATE INDEX IDX_2BAFCC79A76ED395 ON user_user_contact_phone (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2BAFCC79D626887C ON user_user_contact_phone (phonenumber_id)');
        $this->addSql('CREATE TABLE user_address (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, state VARCHAR(100) NOT NULL, city VARCHAR(100) NOT NULL, district VARCHAR(100) NOT NULL, street VARCHAR(100) NOT NULL, number VARCHAR(100) NOT NULL, complement VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE TABLE user_contact_phone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, area_code INTEGER NOT NULL, sufix VARCHAR(9) NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_user_contact_phone');
        $this->addSql('DROP TABLE user_address');
        $this->addSql('DROP TABLE user_contact_phone');
    }
}
