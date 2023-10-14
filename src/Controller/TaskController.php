<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use DateTime;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/task", name: "app_task_")]
class TaskController extends AbstractController
{
    #[Route('/create', name: 'create')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $task = new Task;

        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $entityManager->persist($task);
            $entityManager->flush();
            $this->addFlash('Успех!', "Задача удалена");
            return $this->redirectToRoute('app_task_list');
        }


        return $this->render('task/index.html.twig', [
            'task_form' => $form,


        ]);
    }

    #[Route("/", name: "list")]
    public function list(TaskRepository $taskRepository): Response
    {
        $task = $taskRepository->findAll();

        return $this->render("task/list.html.twig", [
            'tasks' => $task,
        ]);
    }

    #[Route("/view/{id}", name: "view")]
    public function view(int $id, TaskRepository $taskRepository): Response
    {
        $task = $taskRepository->find($id);

        if (!$task) {
            throw $this->createNotFoundException("Задача с номером {$id} не была найдена");
        }

        return $this->render("task/view.html.twig", [
            'task' => $task,
        ]);
    }

    #[Route("/delete/{id}", name: "delete")]
    public function delete(int $id, EntityManagerInterface $entityManager, TaskRepository $taskRepository)
    {
        $task = $taskRepository->find($id);



        if (!$task) {
            throw $this->createNotFoundException("Task {$id} not found");
        }
        $entityManager->remove($task);
        $entityManager->flush();
        $this->addFlash('Успех!', "Таск с номером {$id} успешено удалён");

        return $this->redirectToRoute('app_task_list');
    }

    // Контроллер для апдейта задач

    #[Route("/update/{id}", name: "update")]
    public function update(int $id, EntityManagerInterface $entityManager, TaskRepository $taskRepository, Request $request): Response
    {
        $task = $taskRepository->find($id);

        if (!$task) {
            throw $this->createNotFoundException("Задача с номером {$id} не была найдена");
        }

        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('Успех!', "Задача с номером {$id} была добавлена");
            return $this->redirectToRoute('app_task_view', ['id' => $id]);
        }

        return $this->render('task/updating.html.twig', [
            'task_form' => $form,
            'task' => $task,
        ]);
    }
}
