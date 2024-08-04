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
        $table = $this->table('Notification');
        $table->addColumn('tipo', 'enum', ['values' => ['email', 'whatsapp', 'sms']])
            ->addColumn('destinatário', 'string', ['limit' => 255])
            ->addColumn('mensagem', 'text')
            ->addColumn('data_hora_agendamento', 'datetime')
            ->addColumn('status', 'string', ['limit' => 50])
            ->create();
    }
}