<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use App\Service\TaskService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TaskController extends AbstractController
{

    public function __construct(
        private readonly TaskRepository $taskRepository,
        private readonly TaskService $taskService,
        private readonly EntityManagerInterface $em,
    ){}

    #[Route('/task/add')]
    public function add(Request $request): Response
    {

        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);
        $type="";
        $msg="";

        if($form->isSubmitted() && $form->isValid()) {
            try {
                $this->taskService->addTask($task);
                $type = "success";
                $msg = "Le tache a été ajouté en BDD";
            } 
            catch (\Exception $e) {
                $type = "danger";
                $msg = $e->getMessage();
            }
            
            $this->addFlash($type, $msg);
        }
        return $this->render('addTask.html.twig',[
            'form' =>$form
        ]);
    }

    #[Route('/task')]
    public function showAllTasks(): Response{

        $type="";
        $msg="";

        try{
            $tasks = $this->taskService->getAll();
            $type = "success";
            $msg = "Affichage avec succès";
        } catch(\Exception $e){
            $type = "danger";
            $msg = $e->getMessage();
        }

        $this->addFlash($type, $msg);
        
        return $this->render('showall_tasks.html.twig', [
            "tasks" => $tasks
        ]);
    }
}
