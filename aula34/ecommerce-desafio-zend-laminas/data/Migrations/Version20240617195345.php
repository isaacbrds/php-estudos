<?php

declare(strict_types=1);

namespace Application\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240617195345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add pedidos table';
    }

    public function up(Schema $schema): void
    {
        if (!$schema->hasTable('pedidos')) {
            $table = $schema->createTable('pedidos');

            $table->addColumn('id', 'integer', ['autoincrement' => true]);
            $table->addColumn('clienteId', 'integer');
            $table->addColumn('valor_total', 'decimal', ['precision' => 10, 'scale' => 2]);
            $table->addColumn('descricao', 'text');
            $table->addColumn('data', 'datetime');

            $table->setPrimaryKey(['id']);
        }
    }

    public function down(Schema $schema): void
    {
        if ($schema->hasTable('pedidos')) {
            $schema->dropTable('pedidos');
        }
    }
}
