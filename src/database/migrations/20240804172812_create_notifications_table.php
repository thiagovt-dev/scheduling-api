<?php


use Phinx\Migration\AbstractMigration;

final class CreateNotificationTable extends AbstractMigration
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
        $table = $this->table('notifications');
        $table->addColumn('id', 'integer', ['identity' => true])
            ->addIndex('id', ['unique' => true])
            ->addColumn('type', 'enum', ['values' => ['email', 'whatsapp', 'sms'], 'null' => false])
            ->addColumn('recipient_email', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('recipient_phone', 'string', ['limit' => 20, 'null' => true])
            ->addColumn('message', 'text', ['null' => false])
            ->addColumn('scheduling_date', 'datetime', ['null' => false])
            ->addColumn('interval_minutes', 'integer', ['null' => false])
            ->addColumn('status', 'enum', ['values' => ['pending', 'sent', 'failed'], 'null' => false])
            ->addColumn('created_at', 'datetime', ['null' => false])
            ->addColumn('updated_at', 'datetime', ['null' => false])
            ->create();
    }
}