<?php

namespace App\Controller;

use App\Entity\Rubric;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class RubricController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/rubric", name="rubric")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $rubrics = $em->getRepository(Rubric::class)->getAllBasicInArray();

        foreach ($rubrics as &$rubric){
            /**
             * @var Rubric $rubricObj
             */
            $rubricObj = $em->getRepository(Rubric::class)->find($rubric['id']);
            $children = $rubricObj->getTree();
            $rubric['children'] = $children;
        }

        $response = new Response(json_encode($rubrics));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
