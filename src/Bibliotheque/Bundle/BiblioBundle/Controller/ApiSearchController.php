<?php

namespace Bibliotheque\Bundle\BiblioBundle\Controller;

use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


header('Access-Control-Allow-Origin: http://localhost:4200');
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTION");
class ApiSearchController extends Controller
{

    /**
     * @Route(path="/{mot}/{searchBy}", name="search_by", )
     */
    public function SearchAction($mot, $searchBy)
    {
        $response= new JsonResponse();

        $repLivre= $this->getDoctrine()->getRepository('BibliothequeBiblioBundle:Livre');
        $repLang= $this->getDoctrine()->getRepository('BibliothequeBiblioBundle:Langue');
        $repEdition= $this->getDoctrine()->getRepository('BibliothequeBiblioBundle:Edition');

        $livres= $repLivre->findBy(array('titre'=>$mot));
        $Langues= $repLang->findBy(array('langue'=>$mot));
        $Editions= $repEdition->findBy(array('maison'=>$mot));

        $serializer= $this->get('serializer');
        $group= SerializationContext::create()->setGroups(array('list'));

        $json=json_encode(array());

        if($searchBy=='Book'){
            $json=$serializer->serialize($livres, 'json');
        }elseif($searchBy=='Language'){
        $json=$serializer->serialize($Langues, 'json');
        }elseif($searchBy=='Edition'){
            $json=$serializer->serialize($Editions, 'json');
        }else{
            $json=json_encode(array(
                'else'=>'action search'
            ));
        }



        return $response->setContent($json);
    }
}
