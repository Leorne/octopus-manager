<?php

namespace App\Project\Entity\Project;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as Orm;
use Doctrine\Common\Collections\Collection;
use App\Project\Repository\ProjectRepository;
use App\Project\Entity\Participant\Participant;
use Doctrine\Common\Collections\ArrayCollection;

#[
    Orm\Entity(repositoryClass: ProjectRepository::class),
    Orm\Table(name: 'project__projects')
]
class Project
{
    #[
        Orm\Id,
        Orm\Column(type: 'project__project_id')
    ]
    private Id $id;

    #[Orm\Column(type: 'string')]
    private string $name;

    #[Orm\Column(type: 'string', nullable: true)]
    private ?string $description;

    #[Orm\Column(type: 'string', nullable: true)]
    private ?string $logo = null;

    #[Orm\Column(name: 'created_at', type: 'datetime', nullable: false)]
    private DateTimeImmutable $createdAt;

    #[Orm\Column(name: 'updated_at', type: 'datetime', nullable: false)]
    private DateTimeImmutable $updatedAt;

    #[
        Orm\ManyToMany(targetEntity: Participant::class),
        Orm\JoinTable(name: 'project__participant_projects')
    ]
    private Collection $participants;

    public function __construct(Id $id, string $name)
    {
        $this->id = $id;
        $this->participants = new ArrayCollection();
        $this->setName($name);

        $now = new DateTimeImmutable('now');
        $this->setCreatedAt($now);
        $this->setUpdatedAt($now);
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;
        return $this;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function setUpdatedAt(DateTimeImmutable $updated): self
    {
        $this->updatedAt = $updated;
        return $this;
    }

    public function addParticipant(Participant $participant): self
    {
        $this->participants->add($participant);
        $participant->addProject($this);
        return $this;
    }
}
