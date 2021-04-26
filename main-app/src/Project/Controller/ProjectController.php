<?php

namespace App\Project\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/project', name: 'project')]
class ProjectController extends AbstractController
{
    #[Route(name: '.index', methods: ['GET'])]
    public function index()
    {
        dd(123);
    }
}