<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190529223301 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE vm ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE plan ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE backup ALTER id DROP DEFAULT');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE plan_id_seq');
        $this->addSql('SELECT setval(\'plan_id_seq\', (SELECT MAX(id) FROM plan))');
        $this->addSql('ALTER TABLE plan ALTER id SET DEFAULT nextval(\'plan_id_seq\')');
        $this->addSql('CREATE SEQUENCE vm_id_seq');
        $this->addSql('SELECT setval(\'vm_id_seq\', (SELECT MAX(id) FROM vm))');
        $this->addSql('ALTER TABLE vm ALTER id SET DEFAULT nextval(\'vm_id_seq\')');
        $this->addSql('CREATE SEQUENCE backup_id_seq');
        $this->addSql('SELECT setval(\'backup_id_seq\', (SELECT MAX(id) FROM backup))');
        $this->addSql('ALTER TABLE backup ALTER id SET DEFAULT nextval(\'backup_id_seq\')');
    }
}
