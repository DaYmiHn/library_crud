<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    /**
     * @Route("/", name="book")
     */
    public function index()
    {
        $book = new Book();
        $repository = $this->getDoctrine()->getRepository(Book::class);
        $books = $repository->findAll();
        return $this->render('book/index.html.twig', [
            'books' => $books
        ]);
    }
    /**
     * @Route("/add/{name}/{year}/{author}", name="add_book")
     */
    public function addBook($name,$year,$author){
        $entityManager = $this->getDoctrine()->getManager();

        $book = new Book();
        $book->setName($name);
        $book->setYear($year);
        $book->setAuthor($author);

        $entityManager->persist($book);
        $entityManager->flush();
        return new Response('Saved new book with id '.$book->getId());
    }
    /**
     * @Route("/update/{id}/{name}/{year}/{author}", name="update_book")
     */
    public function updateAction(){
        $entityManager = $this->getDoctrine()->getManager();
        $book = $entityManager->getRepository(Book::class)->find(2);
        $book->setName('OmG!!!');
        $entityManager->flush();

        return new Response('Update book with id '.$book->getId());
    }
    /**
     * @Route("/delete/{id}", name="delete_book")
     */
    public function deleteAction(){
        $entityManager = $this->getDoctrine()->getManager();
        $book = $entityManager->getRepository(Book::class)->find(5);
        $id = $book->getId();
        $entityManager->remove($book);
        $entityManager->flush();

        return new Response('Delete book with id '. $id);
    }
}
