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
        $table = $this->table('services_booking');
        $table->addColumn('id', 'integer', ['identity' => true])
            ->addIndex('id', ['unique' => true])
            ->addColumn('client_name', 'string', ['limit' => 255])
            ->addColumn('client_email', 'string', ['limit' => 255])
            ->addColumn('client_phone', 'string', ['limit' => 20])
            ->addColumn('service', 'string', ['limit' => 255])
            ->addColumn('data_hora', 'datetime')
            ->addColumn('status', 'string', ['limit' => 50])
            ->addColumn('notification_type','enum', ['values' => ['email', 'whatsapp', 'sms']])
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->create();
    }
}