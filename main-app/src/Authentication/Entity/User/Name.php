<?php

namespace App\Authentication\Entity\User;

use Stringable;
use JetBrains\PhpStorm\Pure;
use Doctrine\ORM\Mapping as Orm;

#[Orm\Embeddable]
class Name implements Stringable
{
    #[Orm\Column(name: 'first_name', type: 'string', nullable: true)]
    private ?string $firstName;

    #[Orm\Column(name: 'last_name', type: 'string', nullable: true)]
    private ?string $lastName;

    #[Orm\Column(name: 'nickname', type: 'string', nullable: true)]
    private string $nickname;

    public function __construct(string $nickname)
    {
        $this->nickname = $nickname;
        $this->firstName = null;
        $this->lastName = null;
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

    public function getFullName(): ?string
    {
        $firstNameEmpty = empty($this->firstName);
        $lastNameEmpty = empty($this->lastName);

        if ($firstNameEmpty && $lastNameEmpty) {
            return null;
        }

        if ($firstNameEmpty) {
            return $this->lastName;
        }
        if ($lastNameEmpty) {
            return $this->firstName;
        }

        return sprintf("%s %s", $this->firstName, $this->lastName);
    }

    #[Pure] public function __toString()
    {
        return $this->getNickname();
    }
}
