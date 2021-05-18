<?php

namespace App\Project\Entity\Participant;

use Doctrine\ORM\Mapping as Orm;
use App\Project\Entity\Project\Project;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Project\Repository\ParticipantRepository;

#[
    Orm\Entity(repositoryClass: ParticipantRepository::class),
    Orm\Table(name: 'project__participants')
]
class Participant
{
    #[
        Orm\Id,
        Orm\Column(type: 'project__participant_id')
    ]
    private Id $id;

    #[
        Orm\ManyToMany(targetEntity: Project::class),
        Orm\JoinTable(name: 'project__participant_projects')
    ]
    private Collection $projects;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
    }

    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): self
    {
        $this->projects->add($project);
        return $this;
    }
}
