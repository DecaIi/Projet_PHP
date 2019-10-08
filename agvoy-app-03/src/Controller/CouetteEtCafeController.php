<?php

namespace App\Controller;

use App\Entity\Region;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CouetteEtCafeController extends AbstractController
{
    /**
     * @Route("/couette/et/cafe", name="couette_et_cafe")
     */
    public function index()
    {
        return $this->render('couette_et_cafe/index.html.twig', [
            'controller_name' => 'CouetteEtCafeController',
        ]);
    }


    /**
     * Lists all regions
     * @Route("/region/list", name = "region_list")
     */
    public function RegionList(){
        $em = $this->getDoctrine()->getManager();

        $regions = $em->getRepository(Region::class)->findAll();

        dump($regions);

        return $this->render('couette_et_cafe/index.html.twig', array(
            'regions' => $regions,
        ));
    }

    /**
     * Finds and displays a region.
     *
     * @Route("/{id}", name="region_id", methods="GET")
     * @param $id
     * @return Response
     */
    public function showAction($id): Response
    {
        $em = $this->getDoctrine()->getManager();

        $region = $em->getRepository(Region::class)->findOneBy(['id' => $id]);
        $rooms = $region->getRooms();
        return $this->render('couette_et_cafe/show.html.twig', array(
            'rooms' => $rooms,
        ));
    }
}
