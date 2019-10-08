<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
