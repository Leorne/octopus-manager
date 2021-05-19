<?php

namespace App\Authentication\Entity\Session;

use App\Authentication\Entity\User\User;
use App\Authentication\Repository\SessionRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as Orm;

#[Orm\Entity(repositoryClass: SessionRepository::class), ]
class Session
{
    #[
        Orm\Id,
        Orm\Column(type: 'user__session_id')
    ]
    private Id $id;

    #[Orm\ManyToOne(targetEntity: User::class, inversedBy: 'sessions')]
    private User $user;

    #[Orm\Embedded(class: Token::class)]
    private Token $token;

    #[Orm\Column(name: 'user__sessions_ip', type: 'string', nullable: false)]
    private string $ip;

    #[Orm\Embedded(class: DeviceInfo::class)]
    private DeviceInfo $deviceInfo;

    public function __construct(Id $id,Token $token, User $user, string $ip, DeviceInfo $deviceInfo)
    {
        $this->id = $id;
        $this->user = $user;
        $this->token = $token;
        $this->ip = $ip;
        $this->deviceInfo = $deviceInfo;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getToken(): Token
    {
        return $this->token;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;
        return $this;
    }

    public function getDeviceInfo(): DeviceInfo
    {
        return $this->deviceInfo;
    }
}
