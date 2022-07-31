<?php

namespace App\Controller\Api\v1;

use App\Entity\District;
use App\Repository\DistrictRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class used to deal datas from District
 * 
 * @Route("/api/v1", name="api_v1_")
 */
class DistrictController extends AbstractController
{
    /**
     * @Route("/districts", name="districts_get_list", methods={"GET"})
     */
    public function districtGetList(DistrictRepository $districtRepository)
    {
        $districtsList = $districtRepository->findAll();

        return $this->json(['districts' => $districtsList], Response::HTTP_OK, [], ['groups' => 'districts_get_list']);
    }

    /**
     * @Route("/districts/{id}", name="districts_get_establishments", methods={"GET"}, requirements={"id"="\d+"})
     */
    // public function establishmentsByDistrict(District $district = null)
    // {
    //     // 404 ?
    //     if ($district === null) {
    //         return $this->json(['error' => 'Quartier non trouvé.'], Response::HTTP_NOT_FOUND);
    //     }

                
    //     return $this->json($district, Response::HTTP_OK, [], ['groups' => 'districts_get_establishments']);
    // }


}
