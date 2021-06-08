<?php

namespace App\Project\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity, Table('test')]
class Test
{
    #[
        Id,
        Column(name: 'testtestid', type: 'int')
    ]
    private int $id;
}
