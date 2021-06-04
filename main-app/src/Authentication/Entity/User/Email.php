<?php

namespace App\Authentication\Entity\User;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as Orm;

#[Orm\Embeddable]
class Email
{
    #[Orm\Column(name: 'email', type: 'string', nullable: false)]
    private string $email;

    #[Orm\Column(name: 'new_email', type: 'string', nullable: true)]
    private ?string $newEmail;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getNewEmail(): ?string
    {
        return $this->newEmail;
    }



    public function getExpiredAt(): ?DateTimeImmutable
    {
        return $this->expiredAt;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function setNewEmail(?string $newEmail): self
    {
        $this->newEmail = $newEmail;
        return $this;
    }

}
