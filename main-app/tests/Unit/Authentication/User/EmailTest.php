<?php

namespace App\Tests\Unit\Authentication\User;

use App\Authentication\Entity\User\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    private string $emailValue = 'test@test.com';
    private string $newEmailValue = 'test_new@test.com';
    private string $oldEmailValue = 'test_old@test.com';

    public function testCreateEmailOnlyRequired(): void
    {
        $email = new Email($this->emailValue);

        self::assertEquals($this->emailValue, $email->getEmail());
        self::assertEquals(null, $email->getNewEmail());
        self::assertEquals(null, $email->getOldEmail());
    }

    public function testCreateEmailWithNewAndOld(): void
    {
        $email = new Email($this->emailValue);

        self::assertEquals($this->emailValue, $email->getEmail());
        self::assertEquals(null, $email->getNewEmail());
        self::assertEquals(null, $email->getOldEmail());

        $email->setNewEmail($this->newEmailValue);
        $email->setOldEmail($this->oldEmailValue);

        self::assertEquals($this->newEmailValue, $email->getNewEmail());
        self::assertEquals($this->oldEmailValue, $email->getOldEmail());
    }

    public function testConfirmNewEmail()
    {
        $email = new Email($this->emailValue);

        $email->setNewEmail($this->newEmailValue);

        self::assertEquals($this->newEmailValue, $email->getNewEmail());

        $email->confirmNewEmail();

        self::assertEquals($this->newEmailValue, $email->getEmail());
        self::assertEquals($this->emailValue, $email->getOldEmail());
    }

    public function testConfirmNewEmailFailed()
    {
        $email = new Email($this->emailValue);

        self::expectException(\DomainException::class);
        $email->confirmNewEmail();

    }
}
