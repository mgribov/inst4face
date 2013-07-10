<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

class Version20130709222802 extends AbstractMigration {
    public function up(Schema $schema) {
        $this->addSql("create sequence login_id_seq");
        $this->addSql("create sequence pic_id_seq");

        $this->addSql("
            create table login (
                id bigint not null default nextval('login_id_seq') primary key, 
                name varchar(255) not null, 
                email varchar(255) not null, 
                password char(32) not null, 
                salt varchar(255) not null,
                facebook_id bigint
            )
        ");

        $this->addSql("
            create table pic (
                id bigint not null default nextval('pic_id_seq') primary key,
                login_id int not null,
                name varchar(255) not null,
                url text not null
            )
        ");

    }

    public function down(Schema $schema)
    {
        $this->addSql("drop table login");   
    }
}
