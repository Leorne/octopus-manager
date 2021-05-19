<?php

namespace App\Authentication\Entity\User;

use Doctrine\ORM\Mapping as Orm;

#[Orm\Embeddable]
class Name
{
    #[Orm\Column(name: 'first_name', type: 'string', nullable: true)]
    private ?string $firstName;

    #[Orm\Column(name: 'last_name', type: 'string', nullable: true)]
    private ?string $lastName;

    #[Orm\Column(name: 'nickname', type: 'string', nullable: false)]
    private string $nickname;

    public function __construct(string $nickName, ?string $firstName = null, ?string $lastName = null)
    {
        $this->nickname = $nickName;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function setNickName(string $nickname): self
    {
        $this->nickname = $nickname;
        return $this;
    }
}
