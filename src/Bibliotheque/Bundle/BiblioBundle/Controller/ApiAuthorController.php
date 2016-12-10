<?php

namespace Bibliotheque\Bundle\BiblioBundle\Controller;

use Bibliotheque\Bundle\BiblioBundle\Entity\Personne;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use JMS\Serializer\SerializationContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

header('Access-Control-Allow-Origin: http://localhost:4200');
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTION");


class ApiAuthorController extends Controller
{

    /**
     * @Route(path="/all", name="author_all", requirements={"page":"\d+", "maxItem":"\d+"})
     */
    public function AllAuthorAction()
    {
        $response = new JsonResponse();
        $rep= $this->getDoctrine()->getRepository('BibliothequeBiblioBundle:Personne');



        $Authors= $rep->getPersonnesByType("Auteur");
        $serialiser= $this->get('serializer');
        $groupsList=SerializationContext::create()->setGroups(array('list'));
        $json=$serialiser->serialize($Authors, 'json', $groupsList);
        $response->setContent($json);

        return $response;
    }


    /**
     * @Route(path="/add", name="author_add")
     */
    public function addAuthorAction(Request $request){


        $response= new JsonResponse();
        $content= $request->getContent();
        $params= json_decode($content, true);
        $nom=$params['lastname'];
        $prenom=$params['firstname'];

        $errors=[];

        $IsValid= true;

        //Params Null
        if(is_null($params) || is_null($nom) || is_null($prenom) ){
            $errors[]= array(
                'params'=>array(
                    'code'=>'isNull',
                    'error'=>'request params null'
                )
            );
            return $response->setData(array(
                'action'=> 'add author action',
                'params'=>$params,
                'success'=> false,
                'errors'=>$errors
            ));

        }


        //Validation nom
        if(strlen($nom)==0 || strlen($nom)<3){
            $errors[]=array(
                'firstname'=>array(
                    'code'=>'MinLength',
                    'error'=>'Invalid firstname minlength 3',
                )
            );
            $IsValid=false;
        }elseif(strlen($nom)>20){
            $errors[]=array(
                'firstname'=>array(
                    'code'=>'MaxLength',
                    'error'=>'Invalid firstname maxlength 20',
                )
            );
            $IsValid=false;
        }

        //Validation prenom
        if(strlen($prenom)==0 || strlen($prenom)<3){
            $errors[]=array(
                'lastname'=>array(
                    'code'=>'MinLength',
                    'error'=>'Invalid lastname minlength 3',
                )
            );
            $IsValid=false;
        }elseif(strlen($prenom)>20){
            $errors[]=array(
                'lastname'=>array(
                    'code'=>'MaxLength',
                    'error'=>'Invalid lastname maxlength 20',
                )
            );
            $IsValid=false;
        }




        //add authors
        if($IsValid){

            $rep=$this->getDoctrine()->getRepository('BibliothequeBiblioBundle:TypePersonne');
            $type= $rep->findOneBy(array('type'=>'Auteur'));

            $author= new Personne();
            $author->setNom($nom)->setPrenom($prenom)->setTypePersonne($type);


            $em= $this->getDoctrine()->getManager();
            $em->persist($author);
            $em->flush();



            return $response->setData(array(
                'action'=> 'add author action',
                'author'=>array(
                    'code_personne'=> $author->getCodePersonne(),
                    'nom'=> $author->getNom(),
                    'prenom'=> $author->getPrenom(),
                ),
                'success'=> true,
                'errors'=>$errors,
            ));

        }


        return $response->setData(array(
            'action'=> 'add author action',
            'success'=> false,
            'errors'=>$errors,
        ));


    }


    /**
     * @Route(path="/edit", name="author_edit")
     */
    public function EditAuthorAction(Request $request){

        $response= new JsonResponse();
        $content= $request->getContent();
        $params= json_decode($content,true);



        $nom=$params['nom'];
        $prenom=$params['prenom'];

        $errors=[];

        $IsValid= true;





        //Params Null
        if(is_null($params) || is_null($nom) || is_null($prenom) ){
            $errors[]= array(
                'params'=>array(
                    'code'=>'isNull',
                    'error'=>'request params null'
                )
            );
            return $response->setData(array(
                'action'=> 'edit author action',
                'params'=>$params,
                'success'=> false,
                'errors'=>$errors
            ));

        }


        //Validation nom
        if(strlen($nom)==0 || strlen($nom)<3){
            $errors[]=array(
                'firstname'=>array(
                    'code'=>'MinLength',
                    'error'=>'Invalid firstname minlength 3',
                )
            );
            $IsValid=false;
        }elseif(strlen($nom)>20){
            $errors[]=array(
                'firstname'=>array(
                    'code'=>'MaxLength',
                    'error'=>'Invalid firstname maxlength 20',
                )
            );
            $IsValid=false;
        }

        //Validation prenom
        if(strlen($prenom)==0 || strlen($prenom)<3){
            $errors[]=array(
                'lastname'=>array(
                    'code'=>'MinLength',
                    'error'=>'Invalid lastname minlength 3',
                )
            );
            $IsValid=false;
        }elseif(strlen($prenom)>20){
            $errors[]=array(
                'lastname'=>array(
                    'code'=>'MaxLength',
                    'error'=>'Invalid lastname maxlength 20',
                )
            );
            $IsValid=false;
        }






        $rep= $this->getDoctrine()->getRepository('BibliothequeBiblioBundle:Personne');
        $author= $rep->findOneBy(array('code_personne'=>$params['code_personne']));

        if($IsValid && $author){
            $author->setPrenom($params['prenom'])->setNom($params['nom']);

            $em=$this->getDoctrine()->getManager();
            $em->persist($author);
            $em->flush();

            return $response->setData(array(
                'action'=>'edit author action',
                'success'=> true
            ));

        }


        return $response->setData(array(
            'action'=>'edit author action',
            'success'=> false
        ));



    }



    /**
     * @Route(path="/dell/{id}", name="author_dell", requirements={"id": "\d+"})
     */
    public function DellAuthorAction($id)
    {
        $response = new JsonResponse();
        $rep=$this->getDoctrine()->getRepository('BibliothequeBiblioBundle:Personne');
        $author=$rep->findOneBy(array('code_personne'=>$id));
        if($author){
            $em=$this->getDoctrine()->getManager();
            $em->remove($author);
            $em->flush();
            return $response->setData(array(
                'action'=>'delete author action',
                'success'=>true
            ));
        }
        return $response->setData(array(
            'action'=>'delete author action',
            'success'=>true
        ));
    }




}
