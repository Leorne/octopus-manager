<?php

namespace App\Project\Entity\Project;

use App\Project\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as Orm;

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

    public function __construct(Id $id, string $name)
    {
        $this->$id = $id;
        $this->name = $name;
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

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function setLogo(?string $logo): void
    {
        $this->logo = $logo;
    }
}