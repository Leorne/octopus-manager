<?php

namespace App\Tests\Unit\Authentication\User;

use App\Authentication\Entity\User\Email;
use App\Authentication\Entity\User\Id;
use App\Authentication\Entity\User\Name;
use App\Authentication\Entity\User\Password;
use App\Authentication\Entity\User\Status;
use App\Authentication\Entity\User\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private string $userEmail = 'test@test.com';

    public function testCreateUser(): void
    {
        $id = Id::next();
        $email = new Email($this->userEmail);
        $user = new User($id, $email);

        self::assertTrue($user->getId() instanceof Id);
        self::assertTrue($user->getEmail() instanceof Email);
        self::assertTrue($user->getStatus() instanceof Status);
        self::assertTrue($user->getPassword() instanceof Password);
        self::assertTrue($user->getName() instanceof Name);

        self::assertEquals($id->getValue(), $user->getName()->getNickname());
    }
}
