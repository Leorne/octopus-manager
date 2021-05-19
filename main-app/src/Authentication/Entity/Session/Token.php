<?php

namespace App\Authentication\Entity\Session;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as Orm;

#[Orm\Embeddable]
class Token
{
    #[Orm\Column(name: 'token', type: 'string', nullable: false)]
    private string $token;

    #[Orm\Column(name: 'expired_at', type: 'datetime', nullable: false)]
    private DateTimeImmutable $expiredAt;

    public function __construct(string $token, DateTimeImmutable $expiredAt)
    {
        $this->token = $token;
        $this->expiredAt = $expiredAt;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getExpiredAt(): DateTimeImmutable
    {
        return $this->expiredAt;
    }
}
