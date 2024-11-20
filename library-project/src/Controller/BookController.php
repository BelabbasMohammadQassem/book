<?php
namespace App\Controller;

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/books')]
class BookController extends AbstractController
{

    #[Route('/', name: 'app_home')]  // Changez 'app_book' en 'app_home'
    public function home(EntityManagerInterface $entityManager): Response
    {
        $books = $entityManager->getRepository(Book::class)->findAll();
        
        return $this->render('book/index.html.twig', [
            'books' => $books
        ]);
    }   
    #[Route('/', name: 'book_list')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $books = $entityManager->getRepository(Book::class)->findAll();
        
        return $this->render('book/index.html.twig', [
            'books' => $books
        ]);
    }

    #[Route('/{id}', name: 'book_detail')]
    public function show(Book $book): Response
    {
        return $this->render('book/show.html.twig', [
            'book' => $book
        ]);
    }
}