<?php

namespace App\Controller;

use App\Entity\Building;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class BuildingController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/buildings", name="buildings")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $buildings = $em->getRepository(Building::class)->getAllBuildingArray();

        $response = new Response(json_encode($buildings));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
