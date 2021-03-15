<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210315210113 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, comment LONGTEXT NOT NULL, INDEX IDX_67F068BCA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeuxvideo (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, release_date DATETIME DEFAULT NULL, price INT DEFAULT NULL, introduction VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeuxvideo_categorie (jeuxvideo_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_AF1E477F8FCB884A (jeuxvideo_id), INDEX IDX_AF1E477FBCF5E72D (categorie_id), PRIMARY KEY(jeuxvideo_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeuxvideo_user (jeuxvideo_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_D0BE3898FCB884A (jeuxvideo_id), INDEX IDX_D0BE389A76ED395 (user_id), PRIMARY KEY(jeuxvideo_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeuxvideo_plateforme (jeuxvideo_id INT NOT NULL, plateforme_id INT NOT NULL, INDEX IDX_DDEAF7988FCB884A (jeuxvideo_id), INDEX IDX_DDEAF798391E226B (plateforme_id), PRIMARY KEY(jeuxvideo_id, plateforme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plateforme (id INT AUTO_INCREMENT NOT NULL, console VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, short_name VARCHAR(255) NOT NULL, avatar VARCHAR(255) DEFAULT NULL, introduction VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, slug VARCHAR(255) NOT NULL, phone VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_plateforme (user_id INT NOT NULL, plateforme_id INT NOT NULL, INDEX IDX_9B65CAFDA76ED395 (user_id), INDEX IDX_9B65CAFD391E226B (plateforme_id), PRIMARY KEY(user_id, plateforme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE jeuxvideo_categorie ADD CONSTRAINT FK_AF1E477F8FCB884A FOREIGN KEY (jeuxvideo_id) REFERENCES jeuxvideo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeuxvideo_categorie ADD CONSTRAINT FK_AF1E477FBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeuxvideo_user ADD CONSTRAINT FK_D0BE3898FCB884A FOREIGN KEY (jeuxvideo_id) REFERENCES jeuxvideo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeuxvideo_user ADD CONSTRAINT FK_D0BE389A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeuxvideo_plateforme ADD CONSTRAINT FK_DDEAF7988FCB884A FOREIGN KEY (jeuxvideo_id) REFERENCES jeuxvideo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeuxvideo_plateforme ADD CONSTRAINT FK_DDEAF798391E226B FOREIGN KEY (plateforme_id) REFERENCES plateforme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_plateforme ADD CONSTRAINT FK_9B65CAFDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_plateforme ADD CONSTRAINT FK_9B65CAFD391E226B FOREIGN KEY (plateforme_id) REFERENCES plateforme (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jeuxvideo_categorie DROP FOREIGN KEY FK_AF1E477FBCF5E72D');
        $this->addSql('ALTER TABLE jeuxvideo_categorie DROP FOREIGN KEY FK_AF1E477F8FCB884A');
        $this->addSql('ALTER TABLE jeuxvideo_user DROP FOREIGN KEY FK_D0BE3898FCB884A');
        $this->addSql('ALTER TABLE jeuxvideo_plateforme DROP FOREIGN KEY FK_DDEAF7988FCB884A');
        $this->addSql('ALTER TABLE jeuxvideo_plateforme DROP FOREIGN KEY FK_DDEAF798391E226B');
        $this->addSql('ALTER TABLE user_plateforme DROP FOREIGN KEY FK_9B65CAFD391E226B');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA76ED395');
        $this->addSql('ALTER TABLE jeuxvideo_user DROP FOREIGN KEY FK_D0BE389A76ED395');
        $this->addSql('ALTER TABLE user_plateforme DROP FOREIGN KEY FK_9B65CAFDA76ED395');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE jeuxvideo');
        $this->addSql('DROP TABLE jeuxvideo_categorie');
        $this->addSql('DROP TABLE jeuxvideo_user');
        $this->addSql('DROP TABLE jeuxvideo_plateforme');
        $this->addSql('DROP TABLE plateforme');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_plateforme');
    }
}
