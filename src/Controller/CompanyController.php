<?php

namespace App\Controller;

use App\Entity\Company;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\RequestParam;

class CompanyController extends AbstractFOSRestController
{
    /**
     * @Rest\QueryParam(name="building", requirements="\d+", strict=true, nullable=true, description="")
     *
     * @Rest\Get("/companies/{building}/building", name="companies.buildings")
     */
    public function companiesInBuilding(int $building):Response
    {
        $em = $this->getDoctrine()->getManager();
        $companies = $em->getRepository(Company::class)->getCompaniesFromBuilding($building);

        $response = new Response(json_encode($companies));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Rest\Get("/companies/{rubric}/rubric", name="companies.rubrics")
     */
    public function companiesWithRubric(int $rubric):Response
    {
        $em = $this->getDoctrine()->getManager();
        $companies = $em->getRepository(Company::class)->getCompaniesWithRubric($rubric);

        $response = new Response(json_encode($companies));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Rest\Get("/companies/{x}/{y}/{radius}/radius", name="companies.radius")
     */
    public function companiesInRadius(int $x, int $y, int $radius):Response
    {
        $em = $this->getDoctrine()->getManager();
        $companies = $em->getRepository(Company::class)->getCompaniesInRadius($x, $y, $radius);

        $response = new Response(json_encode($companies));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
