<?php

namespace App\Controller;

use App\Entity\Region;
use App\Form\RegionType;
use App\Repository\RegionRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/region")
 */
class RegionController extends AbstractController
{
    /**
     * @Route("/", name="region_index", methods={"GET"})
     */
    public function index(RegionRepository $regionRepository): Response
    {
        return $this->render('couette_et_cafe/user/region/index.html.twig', [
            'regions' => $regionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="region_new", methods={"GET","POST"})
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function new(Request $request): Response
    {
        $region = new Region();
        $form = $this->createForm(RegionType::class, $region);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($region);
            $entityManager->flush();

            return $this->redirectToRoute('region_index');
        }

        return $this->render('couette_et_cafe/user/region/new.html.twig', [
            'region' => $region,
            'form' => $form->createView(),
        ]);
    }

    /**
 * @Route("/{id}", name="region_show", methods={"GET"})
 */
    public function show(Region $region): Response
    {
        return $this->render('couette_et_cafe/user/region/show.html.twig', [
            'region' => $region,
        ]);
    }
    /**
     * @Route("/{id}/roomslist", name="region_show_list", methods={"GET"})
     */
    public function show_list(Region $region): Response
    {
        $rooms = $region ->getRooms() ;
        return $this->render('couette_et_cafe/user/room/index.html.twig', [
            'rooms' => $rooms,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="region_edit", methods={"GET","POST"})
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function edit(Request $request, Region $region): Response
    {
        $form = $this->createForm(RegionType::class, $region);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('region_index');
        }

        return $this->render('couette_et_cafe/user/region/edit.html.twig', [
            'region' => $region,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("{id}/", name="region_delete", methods={"DELETE"})
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function delete(Request $request, Region $region): Response
    {
        if ($this->isCsrfTokenValid('delete'.$region->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($region);
            $entityManager->flush();
        }

        return $this->redirectToRoute('region_index');
    }
}
