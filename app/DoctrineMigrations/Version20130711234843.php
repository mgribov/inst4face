<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130711234843 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql('create index login_id_idx on pic(login_id)');
        $this->addSql('alter table pic add constraint login_id_fkey foreign key (login_id) references login(id) on delete cascade');

    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs

    }
}
