<?php

namespace App\Service;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use function Symfony\Component\Clock\now;

class TaskService{

    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly TaskRepository $taskRepository
    ){}

    public function addTask(Task $task){

        if($task->getTitle() != "" && $task->getContent() != ""){

            $task->setCreatedAt(now());
            $this->em->persist($task);
            $this->em->flush();
        }
        else {
            throw new \Exception("Les champs ne sont pas tous remplis !", 400);
        }
    }

    public function getAll(){
        $tasks = $this->taskRepository->findAll();

        if($tasks != ""){
            return $tasks;
        }
        else {
            throw new \Exception("La liste est vide !", 400);
        }
    }
}