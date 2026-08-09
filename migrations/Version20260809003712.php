<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260809003712 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE invoice (id INT AUTO_INCREMENT NOT NULL, invoice_date DATE NOT NULL, invoice_number INT NOT NULL, customer_id INT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE invoice_line (id INT AUTO_INCREMENT NOT NULL, description TEXT NOT NULL, quantity INT NOT NULL, amount NUMERIC(12, 2) NOT NULL, vat_amount NUMERIC(12, 2) NOT NULL, total_with_vat NUMERIC(12, 2) NOT NULL, invoice_id INT NOT NULL, INDEX IDX_D3D1D6932989F1FD (invoice_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE invoice_line ADD CONSTRAINT FK_D3D1D6932989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice (id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE invoice_line DROP FOREIGN KEY FK_D3D1D6932989F1FD');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP TABLE invoice_line');
    }
}
