<?php

namespace App\Authentication\Entity\User;

use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as Orm;
use Doctrine\Common\Collections\Collection;
use App\Authentication\Entity\Session\Session;
use App\Authentication\Entity\User\Token\Tokens;
use App\Authentication\Repository\UserRepository;

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

    #[Orm\Embedded(class: Email::class)]
    private Email $email;

    #[Orm\Embedded(class: Password::class)]
    private Password $password;

    #[Orm\Embedded(class: Status::class)]
    private Status $status;

    #[Orm\Embedded(class: Tokens::class)]
    private Tokens $tokens;

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

        $this->status = new Status(Status::STATUS_WAIT);
        $this->password = new Password();
        $this->name = new Name();
        $this->sessions = new ArrayCollection();

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

    public function setPassword(Password $password): self
    {
        $this->password = $password;
        return $this;
    }

}
