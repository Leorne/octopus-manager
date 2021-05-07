<?php

namespace App\Project\Entity\Project;

use Stringable;
use Ramsey\Uuid\Uuid;
use Webmozart\Assert\Assert;

class Id implements Stringable
{
    public function __construct(private string $value)
    {
        Assert::notEmpty($value);
    }

    public static function next(): self
    {
        return new self(Uuid::uuid4()->toString());
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value;
    }
}