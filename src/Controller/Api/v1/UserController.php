<?php

namespace App\Controller\Api\v1;

use App\Entity\User;
use App\Entity\Establishment;
use App\Service\FavoritesManager;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\EstablishmentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use App\Repository\UserRepository;
use DateTimeImmutable;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

/**    
 * Class used to deal datas from User
 * 
 * @Route("/api/v1", name="api_v1_")
 */
class UserController extends AbstractController
{

    //! TO DELETE FOR PROD
    /**
     * @Route("/profils", name="users", methods={"GET"})
     */
    public function usersList(UserRepository $userRepository)
    {
        $usersList = $userRepository->findAll();

        return $this->json(['usersList' => $usersList], Response::HTTP_OK);
    }


    /**
     * @route ("/profils/{id}", name="user_show", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function userGetData(User $user = null, Security $security)
    {
        /**
         * Retrive the current connected user
         * @var User
         */
        //$currentUser = $security->getUser();
        

        //$this->denyAccessUnlessGranted('PROFILE_VIEW', $user);

        if ($security->getUser() !== $user) {
            throw $this->createAccessDeniedException('Non autorisé.');
        }
        
        // 404 ?
        if ($user === null) {
            return $this->json(['error' => 'Utilisateur non trouvé.'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($user, Response::HTTP_OK);
    }

    /**
     * @route ("/profils/{id}/edit", name="user_edit", methods={"PUT"}, requirements={"id"="\d+"})
     */
    public function userPutItem(User $user, Request $request,
    SerializerInterface $serializer,
    ManagerRegistry $doctrine,
    ValidatorInterface $validator,
    UserPasswordHasherInterface $passwordHasher,
    JWTTokenManagerInterface $JWTManager,
    Security $security)
    {
        /**
         * Retrive the current connected user
         * @var User
         */
        $currentUser = $security->getUser();

        if ($currentUser !== $user) {
            throw $this->createAccessDeniedException('Non autorisé.');
        }
        
        $jsonContent = $request->getContent();
        $user = $serializer->deserialize($jsonContent, User::class, 'json');
        $errors = $validator->validate($user);

        if (count($errors) > 0) {
            $cleanErrors = [];

            /** @var ConstraintViolation $error */
            foreach ($errors as $error) {

                $property = $error->getPropertyPath();
                $message = $error->getMessage();
                $cleanErrors[$property][] = $message;
                // array_push($cleanErrors[$property], $message);
            }

            return $this->json($cleanErrors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        $jsonDecode =json_decode(($request->getContent()));
        
        $user->setEmail($jsonDecode->email);
        if (!empty($jsonDecode->password)){
            $user->setPassword($jsonDecode->password);
        }
        $user->setPseudo($jsonDecode->pseudo);
        $user->setFirstname($jsonDecode->firstname);
        $user->setLastname($jsonDecode->lastname);
        $user->setNationality($jsonDecode->nationality);
        $user->setPicture($jsonDecode->picture);

       

        if (!empty($jsonDecode->password)) {
            $plaintextPassword = $user->getPassword();
            // On doit hacher le mot de passe
            $hashedPassword = $passwordHasher->hashPassword($user, $plaintextPassword);
            // On l'écrase dans le $user
            $user->setPassword($hashedPassword);
        }
        
        if ($user->getEmail()!== $jsonDecode->email){
            $emailChange = true;
        }

        if (!empty($emailChange)){
            $newJWT = $JWTManager->create($currentUser);
            return $this->json(['token' => $newJWT, 'user' => $user], Response::HTTP_OK, [], ['Location' => $this->generateUrl('api_v1_user_show', ['id' => $user->getId()]), "json_encode_option" => JSON_UNESCAPED_SLASHES]);
        }

        $user->setRoles(["ROLE_USER"]);

        // Saving into DB
        $em = $doctrine->getManager();
        // $em->persist($user);
        $em->flush();

        return $this->json(
            ['user' => $user], Response::HTTP_OK, [], ['Location' => $this->generateUrl('user_show', ['id' => $user->getId()]), "json_encode_option" => JSON_UNESCAPED_SLASHES]
            
        );
    }

    /**
     * @route ("/profils/{id}", name="user_delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function userDeleteItem(User $user,
    ManagerRegistry $doctrine,
    Security $security)
    {

        if ($security->getUser() !== $user) {
            throw $this->createAccessDeniedException('Non autorisé.');
        }

        if ($user === null) {
            return $this->json(['error' => 'Utilisateur non trouvé.'], Response::HTTP_NOT_FOUND);
        }
        $em = $doctrine->getManager();
        $em->remove($user);
        $em->flush();
        return $this->json(['validate' => 'Votre profil a été supprimé.'], Response::HTTP_OK);
    }

    /**
     * @route ("/profil/ajouter", name="user_add", methods={"POST"})
     */
    public function userPostItem(Request $request,
    SerializerInterface $serializer,
    ManagerRegistry $doctrine,
    ValidatorInterface $validator,
    UserPasswordHasherInterface $passwordHasher)
    {
        
        $jsonContent = $request->getContent();
        $user = $serializer->deserialize($jsonContent, User::class, 'json');
        $errors = $validator->validate($user);

        if (count($errors) > 0) {
            $cleanErrors = [];

            /** @var ConstraintViolation $error */
            foreach ($errors as $error) {

                $property = $error->getPropertyPath();
                $message = $error->getMessage();
                $cleanErrors[$property][] = $message;
                // array_push($cleanErrors[$property], $message);
            }

            return $this->json($cleanErrors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        $passwordInJson = $user->getPassword();
            if ($passwordInJson) {
                // On doit hacher le mot de passe
                $hashedPassword = $passwordHasher->hashPassword($user, $passwordInJson);
                // On l'écrase dans le $user
                $user->setPassword($hashedPassword);
            }
        $user->setRoles(["ROLE_USER"]);

        // Saving into DB
        $em = $doctrine->getManager();
        $em->persist($user);
        $em->flush();

        return $this->json(
            // User créé
            $user,
            // Le status code : 201 CREATED
            Response::HTTP_CREATED,
            // REST demande un header Location + l'URL de la ressource créée
            // (un tableau clé-valeur)
            [
                'Location' => $this->generateUrl('api_v1_user_show', ['id' => $user->getId()])
            ],
            // Pour éviter les références circulaires
            //['groups' => 'user_get_item']
        );
    }
}