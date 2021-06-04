<?php

namespace App\Authentication\Entity\User\Token;

use DateTimeImmutable;

interface TokenInterface
{
    public function getExpiredAt() : ?DateTimeImmutable;

    public function getValue() : ?string;

    public function setExpiredAt(?DateTimeImmutable $datetime) : self;

    public function setValue(?string $value) : self;

    public function isActive() : bool;
}
