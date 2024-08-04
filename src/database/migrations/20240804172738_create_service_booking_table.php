<?php


use Phinx\Migration\AbstractMigration;

final class CreateServiceBookingTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('ServiceBooking');
        $table->addColumn('cliente_nome', 'string', ['limit' => 255])
            ->addColumn('cliente_email', 'string', ['limit' => 255])
            ->addColumn('cliente_telefone', 'string', ['limit' => 20])
            ->addColumn('serviço', 'string', ['limit' => 255])
            ->addColumn('data_hora', 'datetime')
            ->addColumn('status', 'string', ['limit' => 50])
            ->create();
    }
}