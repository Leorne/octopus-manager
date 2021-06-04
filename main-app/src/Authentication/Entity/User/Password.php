<?php

namespace App\Authentication\Entity\User;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as Orm;

#[Orm\Embeddable]
class Password
{
    #[Orm\Column(name: 'password_hash', type: 'string', nullable: true)]
    private ?string $passwordHash;

    #[Orm\Column(name: 'old_password_hash', type: 'string', nullable: true)]
    private ?string $oldPasswordHash;

    #[Orm\Column(name: 'password_updated_at', type: 'datetime', nullable: true)]
    private ?DateTimeImmutable $updatedAt;

    public function getPasswordHash(): ?string
    {
        return $this->passwordHash;
    }

    public function getOldPasswordHash(): ?string
    {
        return $this->oldPasswordHash;
    }

    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }


    public function setPasswordHash(?string $passwordHash): self
    {
        $this->passwordHash = $passwordHash;
        return $this;
    }

    public function setOldPasswordHash(?string $oldPasswordHash): self
    {
        $this->oldPasswordHash = $oldPasswordHash;
        return $this;
    }

    public function setUpdatedAt(?DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
