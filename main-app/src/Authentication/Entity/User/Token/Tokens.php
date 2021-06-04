<?php

namespace App\Authentication\Entity\User\Token;

use Doctrine\ORM\Mapping as Orm;
use JetBrains\PhpStorm\Pure;

#[Orm\Embeddable]
class Tokens
{
    #[Orm\Embedded(class: ConfirmToken::class)]
    private TokenInterface $confirmToken;

    #[Orm\Embedded(class: ResetToken::class)]
    private TokenInterface $resetToken;

    #[Pure] public function __construct(?TokenInterface $confirmToken, ?TokenInterface $resetToken)
    {
        $confirmToken ??= new ConfirmToken();
        $resetToken ??= new ResetToken();

        $this->confirmToken = $confirmToken;
        $this->resetToken = $resetToken;
    }

    public function getConfirmToken(): ConfirmToken
    {
        return $this->confirmToken;
    }

    public function getResetToken(): ResetToken
    {
        return $this->resetToken;
    }

    public function setConfirmToken(ConfirmToken $confirmToken) : self{
        $this->confirmToken = $confirmToken;
        return $this;
    }

    public function setResetToken(ResetToken $resetToken) : self{
        $this->resetToken = $resetToken;
        return $this;
    }
}
