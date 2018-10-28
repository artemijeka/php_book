<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10/25/18
 * Time: 11:23 AM
 */

namespace MVCExample\Models;

use \MVCExample\Models\ActiveRecordEntity;
/**
 * Class User
 * @package MVCExample\ModelsА теперь внимание, просто наследуемся от нашего ActiveRecordEntity и получаем все эти
 * возможности, что есть у сущности Article! Просто добавляем несколько строк и указываем нужную таблицу,
 * где хранятся пользователи.
 */
class User extends ActiveRecordEntity
{
    /** @var string */
    protected $nickname;

    /** @var string */
    protected $email;

    /** @var int */
    protected $isConfirmed;

    /** @var string */
    protected $role;

    /** @var string */
    protected $passwordHash;

    /** @var string */
    protected $authToken;

    /** @var string */
    protected $createdAt;

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @return string
     */
    protected static function getTableName(): string
    {
        return 'users';
    }
}