<?php

namespace App\Controller\Back;

use App\Entity\District;
use App\Form\DistrictType;
use App\Repository\DistrictRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/quartiers")
 */
class DistrictController extends AbstractController
{
    /**
     * 
     * Method used to list the different districts
     * 
     * @Route("", name="back_district_index", methods={"GET"})
     */
    public function index(DistrictRepository $districtRepository): Response
    {
        return $this->render('district/index.html.twig', [
            'districts' => $districtRepository->findAll(),
        ]);
    }
    /**
     * 
     * Method used to add a new district
     * 
     * @Route("/ajouter", name="back_district_new", methods={"GET", "POST"})
     */
    public function new(Request $request, DistrictRepository $districtRepository): Response
    {
        $district = new District();
        $form = $this->createForm(DistrictType::class, $district);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $districtRepository->add($district);
            $this->addFlash('success', 'Quartier ajouté.');
            return $this->redirectToRoute('back_district_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('district/new.html.twig', [
            'district' => $district,
            'form' => $form,
        ]);
    }
    /**
     * 
     * Method used to list establishments by districts
     * 
     * @Route("/{id}", name="back_district_show", methods={"GET"})
     */
    public function show(District $district): Response
    {
        return $this->render('district/show.html.twig', [
            'district' => $district,
        ]);
    }

    

    /**
     * 
     * Method used to edit a new district
     * 
     * @Route("/{id}/editer", name="back_district_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, District $district, DistrictRepository $districtRepository): Response
    {
        $form = $this->createForm(DistrictType::class, $district);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $districtRepository->add($district);
            $this->addFlash('success', 'Quartier modifié.');
            return $this->redirectToRoute('back_district_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('district/edit.html.twig', [
            'district' => $district,
            'form' => $form,
        ]);
    }

    /**
     * 
     * Method used to edit a new district
     * 
     * @Route("/{id}", name="back_district_delete", methods={"POST"})
     */
    public function delete(Request $request, District $district, DistrictRepository $districtRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$district->getId(), $request->request->get('_token'))) {
            $districtRepository->remove($district);
            $this->addFlash('success', 'Film supprimé.');
        }

        return $this->redirectToRoute('back_district_index', [], Response::HTTP_SEE_OTHER);
    }
}
