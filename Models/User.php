<?php
namespace Models;
class User extends ActiveRecordEntity
{
    public $id;
    public $nickname;
    public $email;
    public $isConfirmed;
    public $role;
    public $passwordHash;
    public $authToken;
    public $createdAt;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    protected static function getTableName() :string
    {
        return 'users';
    }
}