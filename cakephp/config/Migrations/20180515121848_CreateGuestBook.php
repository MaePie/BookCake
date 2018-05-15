<?php
use Migrations\AbstractMigration;
use Cake\I18n\Time;

class CreateGuestBook extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('guest_book');
        $table->addColumn('author_name', 'string', [
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('text_fr', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('text_en', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('link', 'string', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('created_at', 'datetime', [
            'default' => Time::now(),
            'null' => false,
        ]);
        $table->addColumn('modified_at', 'datetime', [
            'default' => Time::now(),
            'null' => false,
        ]);
        $table->create();
    }
}
