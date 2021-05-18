<?php

namespace App\Tests\Unit\Project;

use App\Project\Entity\Project\Id;
use App\Project\Entity\Project\Project;
use PHPUnit\Framework\TestCase;

class ProjectTest extends TestCase
{
    public function testCreateProject()
    {
        $id = Id::next();
        $name = 'Test project';
        $project = new Project($id, $name);
        $this->assertEquals($project->getId(), $id);
        $this->assertEquals($project->getName(), $name);
    }
}
