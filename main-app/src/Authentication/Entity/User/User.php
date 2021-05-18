<?php

namespace App\Authentication\Entity\User;

use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;

class User
{
    private Id $id;

    private Name $name;

    private Email $email;

    private string $nickname;

    private Password $password;

    private string $photo;

    private string $status;

    private string $confirmedToken;

    private Collection $sessions;

    private DateTimeImmutable $createdAt;

    private DateTimeImmutable $updatedAt;

    public function __construct(Id $id, Email $email)
    {

    }
}
