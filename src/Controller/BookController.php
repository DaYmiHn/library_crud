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
//        return new Response('Check out this great product: '.$book->getName());
    }
}
