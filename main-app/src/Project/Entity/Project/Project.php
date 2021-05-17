<?php

namespace App\Project\Entity\Project;

use App\Project\Entity\Participant\Participant;
use App\Project\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as Orm;
use JetBrains\PhpStorm\Pure;

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

    #[
        Orm\ManyToMany(targetEntity: Participant::class),
        Orm\JoinTable(name: 'project__participant_projects')
    ]
    private Collection $participants;

    #[Pure] public function __construct(Id $id, string $name)
    {
        $this->$id = $id;
        $this->name = $name;
        $this->participants = new ArrayCollection();
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

    public function addParticipant(Participant $participant) : self
    {
        $this->participants->add($participant);
        $participant->addProject($this);
        return $this;
    }
}
