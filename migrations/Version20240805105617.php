<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240805105617 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lineup (id INT AUTO_INCREMENT NOT NULL, place_id INT DEFAULT NULL, year_id INT NOT NULL, name VARCHAR(255) NOT NULL, date DATE DEFAULT NULL, day VARCHAR(15) DEFAULT NULL, time_from TIME DEFAULT NULL, time_to TIME DEFAULT NULL, night_order INT DEFAULT NULL, description VARCHAR(500) NOT NULL, link VARCHAR(255) DEFAULT NULL, artist_order INT DEFAULT NULL, support INT DEFAULT NULL, created_at DATE NOT NULL, updated_at DATE NOT NULL, INDEX IDX_CD7E0ECADA6A219 (place_id), INDEX IDX_CD7E0ECA40C1FEA7 (year_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATE NOT NULL, updated_at DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE year (id INT AUTO_INCREMENT NOT NULL, name INT NOT NULL, grade VARCHAR(10) NOT NULL, start DATE NOT NULL, end DATE NOT NULL, fest_description1 VARCHAR(1000) DEFAULT NULL, fest_description2 VARCHAR(1000) DEFAULT NULL, fest_price_friday INT DEFAULT NULL, fest_price_saturday INT DEFAULT NULL, fest_price_all INT DEFAULT NULL, fest_price_friday_student INT DEFAULT NULL, fest_price_saturday_student INT DEFAULT NULL, fest_price_all_student INT DEFAULT NULL, lineup_public TINYINT(1) NOT NULL, accomodation_link VARCHAR(255) DEFAULT NULL, ticket_link VARCHAR(255) DEFAULT NULL, created_at DATE NOT NULL, updated_at DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lineup ADD CONSTRAINT FK_CD7E0ECADA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE lineup ADD CONSTRAINT FK_CD7E0ECA40C1FEA7 FOREIGN KEY (year_id) REFERENCES year (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lineup DROP FOREIGN KEY FK_CD7E0ECADA6A219');
        $this->addSql('ALTER TABLE lineup DROP FOREIGN KEY FK_CD7E0ECA40C1FEA7');
        $this->addSql('DROP TABLE lineup');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE year');
    }
}
