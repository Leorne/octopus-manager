<?php

namespace App\Tests\Unit\Authentication\User;

use App\Authentication\Entity\User\Name;
use PHPUnit\Framework\TestCase;

class NameTest extends TestCase
{
    private string $defaultNickname = 'nickname';
    private string $firstName = 'First';
    private string $lastName = 'Last';

    public function testCreateName()
    {
        $name = $this->buildName();

        self::assertEquals($this->defaultNickname, $name->getNickname());

        self::assertNull($name->getFirstName());
        self::assertNull($name->getLastName());
        self::assertNull($name->getFullName());
    }

    public function testStringable()
    {
        $name = $this->buildName();
        self::assertEquals($this->defaultNickname, (string)$name);
    }

    public function testFullName()
    {
        $name = $this->buildName();

        self::assertNull($name->getFullName());

        $name->setFirstName($this->firstName);
        self::assertEquals($name->getFullName(), $this->firstName);

        $name->setFirstName(null);
        $name->setLastName($this->lastName);
        self::assertEquals($name->getFullName(), $this->lastName);

        $name->setFirstName($this->firstName);
        self::assertEquals(sprintf('%s %s', $this->firstName, $this->lastName), $name->getFullName());
    }

    private function buildName() : Name
    {
        return new Name($this->defaultNickname);
    }
}
