<?php

namespace App\Controller\Api\v1;

use App\Entity\Tag;
use App\Entity\District;
use App\Entity\Establishment;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\EstablishmentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;



/**
 * Class used to deal datas from Establishment
 * 
 * @Route("/api/v1", name="api_v1_")
 */
class EstablishmentController extends AbstractController
{

    /**
     * Method used to show all the establishments with a status == 1
     * 
     * @Route("/establishments", name="establishments_get_validated_list", methods={"GET"})
     */
    public function establishmentsGetValidatedList(EstablishmentRepository $establishmentRepository)
    {
        // Looking for the "findByStatus" method into the EstablishmentRepository (call by $establishmentRepository)
        $establishmentsList = $establishmentRepository->findByStatus(1);

        // Sending the datas as a json format
        return $this->json(['establishmentsList' => $establishmentsList], Response::HTTP_OK, [], ['groups' => 'establishments_get_validated']);
    }

    /**
     * Method used to show the 3 establishments with the best rating
     * 
     * @Route("/establishments/best", name="establishments_get_list", methods={"GET"})
     * 
     */
    public function establishmentsGetBest3(EstablishmentRepository $establishmentRepository)
    {
        $establishmentsList = $establishmentRepository->findBestRatingDesc();

        return $this->json(['establishmentsList' => $establishmentsList], Response::HTTP_OK, [], ['groups' => 'establishments_get_validated']);
    }

    /**
     * Method used to show all datas of a specific establishment (by id)
     * 
     * @Route("/establishments/{id}", name="establishment_get_data", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function establishmentsGetData(Establishment $establishment = null)
    {

        if ($establishment === null) {
            return $this->json(['error' => 'Etablissement inexistant (pour le moment !)'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($establishment, Response::HTTP_OK, [], ['groups' => 'establishment_get_data']);
    }

    /**
     * Method used to offer the possibility to the custom to propose an establishment missing in our database
     * 
     * @Route("/establishments", name="establishment_set_data", methods={"POST"}, requirements={"id"="\d+"})
     * @IsGranted("ROLE_USER")
     */
    public function establishmentsPostItem(
        Request $request,
        SerializerInterface $serializer,
        ManagerRegistry $doctrine,
        ValidatorInterface $validator,
        Security $security
    ) {

        $jsonContent = $request->getContent();
        $establishment = $serializer->deserialize($jsonContent, Establishment::class, 'json');
        $errors = $validator->validate($establishment);

        if (count($errors) > 0) {
            $cleanErrors = [];

            /** @var ConstraintViolation $error */
            foreach ($errors as $error) {

                $property = $error->getPropertyPath();
                $message = $error->getMessage();
                $cleanErrors[$property][] = $message;
            }

            return $this->json($cleanErrors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // Put the current user in the form
        $user = $security->getUser();
        //$user = $userRepository->find(1);
        $establishment->getUsers($user);

        // Saving into DB
        $em = $doctrine->getManager();
        $em->persist($establishment);
        $em->flush();

        return $this->json(
            $establishment,
            Response::HTTP_CREATED,
            [
                'Location' => $this->generateUrl(
                    'api_v1_establishments_get_list',
                    [
                        'id' => $establishment->getId()
                    ]
                )
            ],
            ['groups' => 'establishments_get_list']
        );
    }

    /**
     * Method used to sort establishments by type ("restaurant" or "izakaya")
     * 
     * @Route("/establishments/{type}", name="establishment_get_by_type", methods={"GET"})
     * 
     */
    public function establishmentsGetListByType(
        Establishment $establishment,
        EstablishmentRepository $establishmentRepository
    ) {
        $type = $establishment->getType();
        $establishmentsList = $establishmentRepository->findByType($type);
        return $this->json(['establishmentsList' => $establishmentsList], Response::HTTP_OK, [], ['groups' => 'establishments_get_list']);
    }


    //! OLD

    // /**
    //  * @Route("/establishments/{id}", name="establishment_delete_data", methods={"DELETE"}, requirements={"id"="\d+"})
    //  */
    // public function establishmentsDeleteType(Establishment $establishment)
    // {
    //     if ($establishment === null) {
    //         return $this->json(['error' => 'Etablissement inexistant (pour le moment !)'], Response::HTTP_NOT_FOUND);
    //     }

    //     if ($establishment) {
    //         // debated point: should we 404 on an unknown nickname?
    //         // or should we just return a nice 204 in all cases?           
    //         $em = $this->getDoctrine()->getManager();
    //         $em->remove($establishment);
    //         $em->flush();
    //     }

    //     return $this->json($establishment, Response::HTTP_OK, [], ['groups' => 'establishment_get_list']);
    // }

}
