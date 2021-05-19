<?php

namespace App\Authentication\Entity\User;

use App\Authentication\Entity\Session\Session;
use App\Authentication\Repository\UserRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as Orm;
use Doctrine\Common\Collections\Collection;

#[
    Orm\Entity(repositoryClass: UserRepository::class),
    Orm\HasLifecycleCallbacks
]
class User
{
    #[
        Orm\Id,
        Orm\Column(type: 'user__user_id')
    ]
    private Id $id;

    #[Orm\Embedded(class: Name::class)]
    private Name $name;

    #[Orm\Column(type: 'user__user_email')]
    private Email $email;

    #[Orm\Embedded(class: Password::class)]
    private Password $password;

    #[Orm\Column(type: 'string', nullable: true)]
    private ?string $photo;

    #[Orm\Embedded(class: Status::class)]
    private Status $status;

    #[Orm\Embedded(class: ConfirmationToken::class)]
    private ConfirmationToken $confirmationToken;

    #[Orm\Embedded(class: ResetToken::class)]
    private ResetToken $resetToken;

    #[Orm\OneToMany(mappedBy: 'user', targetEntity: Session::class)]
    private Collection $sessions;

    #[Orm\Column(name: 'created_at', type: 'datetime', nullable: false)]
    private DateTimeImmutable $createdAt;

    #[Orm\Column(name: 'updated_at', type: 'datetime', nullable: false)]
    private DateTimeImmutable $updatedAt;

    public function __construct(Id $id, Email $email)
    {
        $this->id = $id;
        $this->email = $email;

        $now = new DateTimeImmutable('now');
        $this->setCreatedAt($now);
        $this->setUpdatedAt($now);
    }


    public function getId(): Id
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getConfirmationToken(): ConfirmationToken
    {
        return $this->confirmationToken;
    }

    public function getResetToken(): ResetToken
    {
        return $this->resetToken;
    }

    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setName(Name $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;
        return $this;
    }

    public function setStatus(Status $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function setConfirmationToken(ConfirmationToken $confirmationToken): self
    {
        $this->confirmationToken = $confirmationToken;
        return $this;
    }

    public function setResetToken(ResetToken $resetToken): self
    {
        $this->resetToken = $resetToken;
        return $this;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function setUpdatedAt(DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }


}
