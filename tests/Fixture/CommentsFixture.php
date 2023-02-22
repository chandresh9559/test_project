<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CommentsFixture
 */
class CommentsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'posts_id' => 1,
                'user_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'comment' => 'Lorem ipsum dolor sit amet',
                'created_date' => '2023-01-25 09:03:13',
            ],
        ];
        parent::init();
    }
}
