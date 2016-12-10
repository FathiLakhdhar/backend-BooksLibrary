<?php

namespace Bibliotheque\Bundle\BiblioBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Bibliotheque\Bundle\BiblioBundle\Entity\Langue;




header('Access-Control-Allow-Origin: http://localhost:4200');
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTION");

class ApiLanguageController extends Controller
{



    /**
     * @Route(path="/all", name="language_all")
     *
     */
    public function getAllLanguageAction()
    {
        $languages=array();
        $rep= $this->getDoctrine()->getRepository("BibliothequeBiblioBundle:Langue");
        $languages=$rep->findAll();

        $serializer= $this->get('jms_serializer');
        $json=$serializer->serialize($languages,'json');

        $response = new Response();
        $response->setContent($json);
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }




    /**
     * @Route(path="/add", name="language_add")
     *
     */
    public function AddLanguageAction(Request $request)
    {

        $langue = new Langue();
        $rep= $this->getDoctrine()->getRepository('BibliothequeBiblioBundle:Langue');

        $response = new Response();

        $params  = array();

        $Errors_language = array();
        $content=$request->getContent();
        $params = json_decode($content, true);

        $lang=$params['language'];
        $IsValid= true;


        //Empty language
        if(is_null($lang) || strlen($lang) == 0){
            $Errors_language[]=array(
                'code'=>'IsNull',
                'error'=>'champ language isNull Or Empty'
            );
            $IsValid=false;

        }elseif(strlen($lang)>20){
            $Errors_language[]=array(
                'code'=>'MaxLength',
                'error'=>'champ language > 20 lettre'
            );
            $IsValid=false;
        }elseif(($rep->findOneBy(array('langue'=>$lang)) != null  )){
            $Errors_language[]=array(
                'code'=>'Exist',
                'error'=>'language Exist'
            );
            $IsValid=false;
        }




        if($IsValid){

            $em= $this->getDoctrine()->getManager();

            $langue->setLangue($lang);

            $em->persist($langue);
            $em->flush();



            $response->setContent(
                json_encode(array(
                    'action' => 'Add Book Action',
                    'language'=>array(
                        'code_langue'=>$langue->getCodeLangue(),
                        'langue'=>$langue->getLangue(),
                    ),
                    'success'=> true
                ))
            );

        }else{
            $response->setContent(
                json_encode(array(
                    'action' => 'Add Book Action',
                    'errors'=> array(
                        'Errors_language'=>$Errors_language,
                    ),
                    'success'=> false
                ))
            );
        }



        $response->headers->set('Content-Type', 'application/json');

        return $response;


    }



    /**
     * @Route(path="/edit", name="language_edit")
     */
    public function EditLanguageAction(Request $request){

        $response= new JsonResponse();


        $content=$request->getContent();
        $params = json_decode($content, true);

        $id=$params['code_langue'];
        $langEdit=$params['langue'];


        $rep= $this->getDoctrine()->getRepository('BibliothequeBiblioBundle:Langue');

        $langue=$rep->findOneBy(array('code_langue'=>$id));



        if($langue){//langue exist
            $em= $this->getDoctrine()->getManager();
            $langue->setLangue($langEdit);
            $em->persist($langue);
            $em->flush();

            $response->setData(
                array(
                    'action'=> 'edit language {'.$id.'}',
                    'success'=>true,
                )
            );
        }else{

            $response->setData(
                array(
                    'action'=> 'edit language {'.$id.'}',
                    'success'=>false,
                    'errors'=>'Not Exist language {'.$id.'}',
                )
            );

        }


        return $response;

    }


    /**
     * @Route(path="/dell/{id}", name="language_dell", requirements={"id": "\d+"})
     */
    public function DellLanguageAction($id){

        $response= new JsonResponse();
        $em= $this->getDoctrine()->getManager();
        $langue=$em->find('BibliothequeBiblioBundle:Langue', $id);

        if($langue){
            $em->remove($langue);
            $em->flush();
            $response->setData(array(
                'action'=> 'dell lanuage {'.$id.'}',
                'success'=> true
            ));
        }else{
            $response->setData(array(
                'action'=> 'dell lanuage {'.$id.'}',
                'success'=> false,
                'errors'=>'lanuage {'.$id.'} Not Exist'
            ));
        }

        return $response;

    }


}
