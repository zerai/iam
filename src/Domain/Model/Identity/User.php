<?php

declare(strict_types=1);

namespace OpenDaje\IdentityAccess\Domain\Model\Identity;

class User
{
    private $userId;
    private $email;
    private $password;
    private $person;

    public function __construct(UserId $userId, EmailAddress $email, string $password, Person $person)
    {
        $this->userId = $userId;
        $this->email = $email;
        $this->password = $password;
        $this->person = $person;
    }

    public function changePersonalName(FullName $aPersonalName): void
    {
        $this->person = $this->person()->changeName($aPersonalName);
    }

    public function changePassword($password): void
    {
        $this->password = $password;
    }

    public function userId(): UserId
    {
        return $this->userId;
    }

    public function email(): EmailAddress
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function person(): Person
    {
        return $this->person;
    }
}