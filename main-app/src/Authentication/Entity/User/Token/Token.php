<?php

namespace App\Authentication\Entity\User\Token;

use DateTimeImmutable;
use DomainException;

abstract class Token implements TokenInterface
{
    protected ?string $value;

    protected ?DateTimeImmutable $expiredAt;

    public function getValue() : ?string
    {
        return $this->value;
    }

    public function getExpiredAt() : ?DateTimeImmutable
    {
        return $this->expiredAt;
    }

    public function setValue(?string $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function setExpiredAt(?DateTimeImmutable $expiredAt): self
    {
        $this->expiredAt = $expiredAt;
        return $this;
    }

    public function isActive() : bool
    {
        if(empty($this->value) || empty($this->expiredAt)){
            throw new DomainException('Token value or expired datetime not exists');
        }

        $now = new DateTimeImmutable();
        return $now <= $this->expiredAt;
    }
}
