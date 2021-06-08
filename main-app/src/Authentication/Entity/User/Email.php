<?php

namespace App\Authentication\Entity\User;

use Doctrine\ORM\Mapping as Orm;

#[Orm\Embeddable]
class Email
{
    #[Orm\Column(name: 'email', type: 'string', nullable: false)]
    private string $email;

    #[Orm\Column(name: 'new_email', type: 'string', nullable: true)]
    private ?string $newEmail;

    #[Orm\Column(name: 'old_email', type: 'string', nullable: true)]
    private ?string $oldEmail;

    public function __construct(string $email)
    {
        $this->email = $email;
        $this->newEmail = null;
        $this->oldEmail = null;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getNewEmail(): ?string
    {
        return $this->newEmail;
    }

    public function getOldEmail(): ?string
    {
        return $this->oldEmail;
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

    public function setOldEmail(?string $oldEmail): self
    {
        $this->oldEmail = $oldEmail;
        return $this;
    }

    public function confirmNewEmail(): self
    {
        if (empty($this->newEmail)) {
            throw  new \DomainException('U cannot confirm email which not exists');
        }

        $this->setOldEmail($this->email);
        $this->setEmail($this->newEmail);
        $this->setNewEmail(null);

        return $this;
    }
}
