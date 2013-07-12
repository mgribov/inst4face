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
                pics int not null default 0,
                facebook_id bigint
            )
        ");

        $this->addSql("
            create table pic (
                id bigint not null default nextval('pic_id_seq') primary key,
                login_id int not null,
                name varchar(255) not null,
                url text not null,
                likes int not null default 0
            )
        ");

        $this->addSql("
            CREATE OR REPLACE FUNCTION pic_count() RETURNS TRIGGER AS $$
            BEGIN
                IF TG_OP = 'INSERT' THEN

                    UPDATE login SET pics = pics + 1 WHERE id = NEW.login_id;
                    RETURN NEW;

                ELSIF TG_OP = 'DELETE' THEN

                    UPDATE login SET pics = pics - 1 WHERE id = NEW.login_id;
                    RETURN NULL;

                END IF;
            END;
            $$ language 'plpgsql';        
        ");
        $this->addSql('CREATE TRIGGER counter AFTER INSERT OR DELETE ON pic FOR EACH ROW EXECUTE PROCEDURE pic_count()');

    }

    public function down(Schema $schema)
    {
        // SQL to undo everything in up()
    }
}
