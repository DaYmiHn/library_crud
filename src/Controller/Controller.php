<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function number()
    {
        $num = random_int(0, 100);

        return new Response(
            '<html><body>'.$num.'</body></html>'
        );
    }
}