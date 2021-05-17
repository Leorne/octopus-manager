<?php

namespace App\Project\Entity\Participant;

use App\Project\Entity\Project\Project;
use App\Project\Repository\ParticipantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\Table;

#[
    Entity(repositoryClass: ParticipantRepository::class),
    Table(name: 'project__participants')
]
class Participant
{
    #[
        ManyToMany(targetEntity: Project::class),
        JoinTable(name: 'project__participant_projects')
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
