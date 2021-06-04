<?php

namespace App\Authentication\Entity\User;

use Doctrine\ORM\Mapping as Orm;
use Webmozart\Assert\Assert;

#[Orm\Embeddable]
class Status
{
    public const STATUS_BLOCKED = 0;
    public const STATUS_WAIT = 1;
    public const STATUS_ACTIVE = 2;

    public const LABELS = [
        self::STATUS_BLOCKED => 'Заблокирован',
        self::STATUS_WAIT => 'В ожидании',
        self::STATUS_ACTIVE => 'Акивен',
    ];

    #[Orm\Column(name: 'status', type: 'smallint', nullable: 'false')]
    private int $status;

    public function __construct(int $status)
    {
        Assert::oneOf($status, [
            self::STATUS_BLOCKED,
            self::STATUS_WAIT,
            self::STATUS_ACTIVE,
        ]);

        $this->status = $status;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getStatusLabel(): string
    {
        return self::LABELS[$this->status];
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isBlocked(): bool
    {
        return $this->status === self::STATUS_BLOCKED;
    }

    public function isWait(): bool
    {
        return $this->status === self::STATUS_WAIT;
    }

    public function activate(): self
    {
        $this->status = self::STATUS_ACTIVE;
        return $this;
    }

    public function setWait(): self
    {
        $this->status = self::STATUS_WAIT;
        return $this;
    }

    public function block(): self
    {
        $this->status = self::STATUS_BLOCKED;
        return $this;
    }
}
