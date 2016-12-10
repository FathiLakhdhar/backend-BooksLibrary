<?php

namespace Bibliotheque\Bundle\BiblioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ApiLivreController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route(path="/", name="books_home")
     */
    public function indexAction()
    {
        $response = new JsonResponse();
        $response->setData(
            array(
                'action' => 'Home Book Action'
            )
        );

        return $response;
    }


    /**
     * @Route(path="/add", name="books_add")
     *
     */
    public function AddBookAction(Request $request)
    {
        header('Access-Control-Allow-Origin: http://localhost:4200');
        header("Access-Control-Allow-Headers: Content-Type");
        $response = new Response();

        $params  = array();
        $content=$request->getContent();
        $params = json_decode($content, true);
        $response->setContent(
            json_encode(array(
                'action' => 'Add Book Action',
                'title'=> $params['book']['title'],
                'params'=>$params['book']
            ))
        );
        $response->headers->set('Content-Type', 'application/json');

        return $response;


    }


}
