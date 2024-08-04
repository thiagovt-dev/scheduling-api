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
            ->addColumn('type', 'enum', ['values' => ['email', 'whatsapp', 'sms']])
            ->addColumn('recipient_name', 'string', ['limit' => 255])
            ->addColumn('message', 'text')
            ->addColumn('scheduling_date', 'datetime')
            ->addColumn('status', 'enum', ['values' => ['pending', 'sent', 'failed']])
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->create();
    }
}