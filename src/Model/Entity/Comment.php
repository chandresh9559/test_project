<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comment Entity
 *
 * @property int $id
 * @property int $posts_id
 * @property int $user_id
 * @property string $name
 * @property string $comment
 * @property \Cake\I18n\FrozenTime $created_date
 *
 * @property \App\Model\Entity\Post $post
 */
class Comment extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'posts_id' => true,
        'user_id' => true,
        'name' => true,
        'comment' => true,
        'created_date' => true,
        'post' => true,
    ];
}
