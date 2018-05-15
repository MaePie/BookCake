<?php
use Migrations\AbstractMigration;

class CreateGuestBookComments extends AbstractMigration
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
        $table = $this->table('guest_book_comments'
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
            'default' => date('Y-m-d H:i:s'),
            'null' => false,
        ]);
        $table->addColumn('modified_at', 'datetime', [
            'default' => date('Y-m-d H:i:s'),
            'null' => false,
        ]);
        $table->create();
    }
}
