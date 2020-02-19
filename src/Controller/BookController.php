<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    /**
     * @Route("/", name="index_book")
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
     * @Route("/add", name="add_book")
     * @param $request
     * @return Response
     */
    public function addBook(Request $request){
        $entityManager = $this->getDoctrine()->getManager();

        $book = new Book();
        $book->setName($request->get('name'));
        $book->setYear($request->get('year'));
        $book->setAuthor($request->get('author'));

        $entityManager->persist($book);
        $entityManager->flush();
        return new Response('Saved new book with id '.$book->getId());
    }
    /**
     * @Route("/update", name="update_book")
     * @param $request
     * @return Response
     */
    public function updateAction(Request $request){
        $entityManager = $this->getDoctrine()->getManager();
        $book = new Book();
        $book = $entityManager->getRepository(Book::class)->find($request->get('id'));
        $book->setName($request->get('name'));
        $book->setYear($request->get('year'));
        $book->setAuthor($request->get('author'));

        $entityManager->flush();
        return new Response('Update book with id '.$book->getId());
    }

    /**
     * @Route("/delete/{id}", name="delete_book")
     * @param $id
     * @return Response
     */
    public function deleteAction($id){
        $entityManager = $this->getDoctrine()->getManager();
        $book = new Book();
        $book = $entityManager->getRepository(Book::class)->find($id);

        $entityManager->remove($book);
        $entityManager->flush();

        return new Response('Delete book with id '. $id);
    }
}
