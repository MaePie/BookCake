<?php
use Migrations\AbstractSeed;

/**
 * GuestBookComments seed.
 */
class GuestBookCommentsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'author_name' => 'Maël Mayon',
                'text_fr' => 'Après plusieurs année a recherer LE restaurant parfait, j\'ai eu la chance et le plaisir de décourvir Au fil de l\'eau ! Les plats y sont succulent et le personnel a été au top durant toute la durée de mon séjour a Toulouse où j\'ai décidé de me rendre plusieurs fois déjeuner et diner là bas.',
                'text_en' => 'After several years looking for THE perfect restaurant, I had the chance and the pleasure to discover Over the water! The food is great and the staff was on top for the duration of my stay in Toulouse where I decided to go for lunch and dinner there several times.',
                'link' => '<a href="http://www.tripadvisor.com">',
                'created_at' => date('Y-m-d H:i:s'),
                'modified_at' => date('Y-m-d H:i:s')
            ],
            [
                'author_name' => 'Pierre Maueur',
                'text_fr' => 'Après plusieurs année a recherer LE restaurant parfait, j\'ai eu la chance et le plaisir de décourvir Au fil de l\'eau ! Les plats y sont succulent et le personnel a été au top durant toute la durée de mon séjour a Toulouse où j\'ai décidé de me rendre plusieurs fois déjeuner et diner là bas.',
                'text_en' => 'After several years looking for THE perfect restaurant, I had the chance and the pleasure to discover Over the water! The food is great and the staff was on top for the duration of my stay in Toulouse where I decided to go for lunch and dinner there several times.',
                'link' => '<a href="http://www.tripadvisor.com">',
                'created_at' => date('Y-m-d H:i:s'),
                'modified_at' => date('Y-m-d H:i:s')
            ]
        ];
        $table = $this->table('guest_book_comments');
        $table->insert($data)->save();
    }
}
