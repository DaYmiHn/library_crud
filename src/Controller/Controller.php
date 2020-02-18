<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Controller extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function number()
    {
        $num = random_int(0, 100);

//        return new Response(
//            '<html><body>'.$num.'</body></html>'
//        );
        $number = random_int(0, 100);

        return $this->render('base.html.twig', [
            'number' => $number,
        ]);
    }
}