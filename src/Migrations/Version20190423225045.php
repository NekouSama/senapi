<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190423225045 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE application1date (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, date DATE NOT NULL, INDEX IDX_7B7096DEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE application1date_application1task (application1date_id INT NOT NULL, application1task_id INT NOT NULL, INDEX IDX_D1AE2848964881D1 (application1date_id), INDEX IDX_D1AE2848A369B63C (application1task_id), PRIMARY KEY(application1date_id, application1task_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE application1objectif (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, started_at DATETIME DEFAULT NULL, finished_at DATETIME DEFAULT NULL, benchmark VARCHAR(255) DEFAULT NULL, success_rate INT NOT NULL, INDEX IDX_C962ED74A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE application1task (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, started_at DATETIME DEFAULT NULL, finished_at DATETIME DEFAULT NULL, INDEX IDX_83907A81A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE application1task_application1objectif (application1task_id INT NOT NULL, application1objectif_id INT NOT NULL, INDEX IDX_8CA35EC3A369B63C (application1task_id), INDEX IDX_8CA35EC37DD588A0 (application1objectif_id), PRIMARY KEY(application1task_id, application1objectif_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE application1date ADD CONSTRAINT FK_7B7096DEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE application1date_application1task ADD CONSTRAINT FK_D1AE2848964881D1 FOREIGN KEY (application1date_id) REFERENCES application1date (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE application1date_application1task ADD CONSTRAINT FK_D1AE2848A369B63C FOREIGN KEY (application1task_id) REFERENCES application1task (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE application1objectif ADD CONSTRAINT FK_C962ED74A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE application1task ADD CONSTRAINT FK_83907A81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE application1task_application1objectif ADD CONSTRAINT FK_8CA35EC3A369B63C FOREIGN KEY (application1task_id) REFERENCES application1task (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE application1task_application1objectif ADD CONSTRAINT FK_8CA35EC37DD588A0 FOREIGN KEY (application1objectif_id) REFERENCES application1objectif (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE application1date_application1task DROP FOREIGN KEY FK_D1AE2848964881D1');
        $this->addSql('ALTER TABLE application1task_application1objectif DROP FOREIGN KEY FK_8CA35EC37DD588A0');
        $this->addSql('ALTER TABLE application1date_application1task DROP FOREIGN KEY FK_D1AE2848A369B63C');
        $this->addSql('ALTER TABLE application1task_application1objectif DROP FOREIGN KEY FK_8CA35EC3A369B63C');
        $this->addSql('DROP TABLE application1date');
        $this->addSql('DROP TABLE application1date_application1task');
        $this->addSql('DROP TABLE application1objectif');
        $this->addSql('DROP TABLE application1task');
        $this->addSql('DROP TABLE application1task_application1objectif');
    }
}
