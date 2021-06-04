<?php

namespace App\Authentication\Entity\User\Token;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as Orm;

#[Orm\Embeddable]
class ConfirmToken extends Token
{
    #[Orm\Column(name: 'confirm_token', type: 'string', nullable: true)]
    protected ?string $value;

    #[Orm\Column(name: 'confirm_token_expired_at', type: 'datetime', nullable: true)]
    protected ?DateTimeImmutable $expiredAt;
}
