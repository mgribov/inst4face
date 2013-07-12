<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130710161438 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("ALTER TABLE pic ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL");
        $this->addSql("ALTER TABLE login ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL");
    }

    public function down(Schema $schema)
    {
        $this->addSql("ALTER TABLE pic DROP created_at");
        $this->addSql("ALTER TABLE login DROP created_at");
    }
}
