<?php

namespace Bibliotheque\Bundle\BiblioBundle\Controller;

use Bibliotheque\Bundle\BiblioBundle\Entity\Edition;
use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

header('Access-Control-Allow-Origin: http://localhost:4200');
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTION");

class ApiEditionController extends Controller
{
    /**
     * @Route(path="/all", name="edition_all")
     */
    public function AllEditionAction()
    {
        $response= new JsonResponse();

        $rep= $this->getDoctrine()->getRepository('BibliothequeBiblioBundle:Edition');
        $editions= $rep->findAll();
        $serializer=$this->get('serializer');
        $group= SerializationContext::create()->setGroups(array('list'));
        $json=$serializer->serialize($editions,'json', $group);

        return $response->setContent($json);
    }


    /**
     * @Route(path="/add", name="edition_add")
     */
    public function AddEditionAction(Request $request){

        $response= new JsonResponse();

        $content= $request->getContent();
        $params= json_decode($content, true);

        $errors=array();
        $isvalid=true;

        $isbn=$params['isbn'];
        $maison=$params['maison'];
        $pays=$params['pays'];


        if(!preg_match('/^[1-9][0-9]{0,9}$/',$isbn)){
            $errors[]=array(
                'code'=>'patern',
                'error'=>'isbn isNot a digit number'
            );
            $isvalid=false;
        }else{
            $isbn=(integer)$isbn;
        }


        if(!preg_match('/^[a-zA-Z](.{2,99})$/',$maison)){
            $errors[]=array(
                'code'=>'Length',
                'error'=>'maison first letter[a-zA-Z], minLength : 3 , maxLength : 100'
            );
            $isvalid=false;
        }


        if(!preg_match('/^[a-zA-Z](.{2,29})$/',$pays)){
            $errors[]=array(
                'code'=>'Length',
                'error'=>'pays first letter[a-zA-Z], minLength : 3 , maxLength : 100'
            );
            $isvalid=false;
        }




        if($isvalid){
            $rep= $this->getDoctrine()->getRepository('BibliothequeBiblioBundle:Edition');
            $edition=$rep->findOneBy(array('isbn'=>$isbn));

            if($edition){// Edition exist
                $errors[]=array(
                    'code'=>'Exist',
                    'error'=>'isbn exist deja'
                );

                return $response->setData(array(
                    'action'=>'add edition action',
                    'success'=>false,
                    'errors'=> $errors
                ));

            }else{//add edition
                $edition= new Edition();
                $em= $this->getDoctrine()->getManager();

                $edition->setIsbn($isbn);
                $edition->setMaison($maison)->setPays($pays);
                $em->persist($edition);
                $em->flush();
                return $response->setData(array(
                    'action'=>'add edition action',
                    'success'=>true,
                    'edition'=>array(
                        'isbn'=>$edition->getIsbn(),
                        'maison'=>$edition->getMaison(),
                        'pays'=>$edition->getPays(),
                    ),
                    'errors'=> $errors
                ));
            }
        }




        // isvalid = false
        return $response->setData(array(
            'action'=>'add edition action',
            'success'=>false,
            'errors'=> $errors
        ));
    }



    /**
     * @Route(path="/dell/{isbn}", name="edition_dell")
     */
    public function DellEditionAction($isbn)
    {
        $response=new JsonResponse();
        $rep=$this->getDoctrine()->getRepository('BibliothequeBiblioBundle:Edition');
        $edition= $rep->findOneBy(array('isbn'=>$isbn));

        if($edition){
            $em=$this->getDoctrine()->getManager();
            $em->remove($edition);
            $em->flush();
            return $response->setData(array(
               'action'=>'dell edition action',
                'success'=>true
            ));
        }else{
        return $response->setData(array(
            'action'=>'dell edition action',
            'success'=>false,
            'error'=>'editition notExist'
        ));
        }
    }

}
