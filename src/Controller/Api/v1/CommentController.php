<?php

namespace App\Controller\Api\v1;

use App\Entity\Tag;
use App\Entity\Comment;
use App\Entity\Establishment;
use App\Repository\TagRepository;
use App\Repository\UserRepository;
use App\Repository\CommentRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\EstablishmentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Class used to deal datas from Comments
 * 
 * @Route("/api/v1", name="api_v1_")
 */
class CommentController extends AbstractController
{
    /**
     * @Route("/comments", name="comments_get_list", methods={"GET"})
     */
    public function browseComments(CommentRepository $commentRepository)
    {
        $commentsList = $commentRepository->findAll();

        return $this->json(['comments' => $commentsList], Response::HTTP_OK, [], ['groups' => 'comments_get_list']);
    }

    /**
     * @Route("/comment/{id}", name="comment_delete", methods={"DELETE"})
     * @ParamConverter("comment", options={"id" = "id"})
     */
    public function deleteComment(Request $request, Comment $comment, CommentRepository $commentRepository): Response
    {
        // if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->request->get('_token'))) {
        //     $commentRepository->remove($comment);
        //     $this->addFlash('success', 'Commentaire supprimé');
        // }

        $commentRepository->remove($comment);

        return $this->redirectToRoute($request->getRequestUri(), [], Response::HTTP_SEE_OTHER);
        // return $app->redirect($request->getRequestUri());

    }

    /**
     * Method permitting to add a comment to a specified establishment
     * 
     * @Route("/establishment/{id}/comments", name="addComment", methods={"POST"})
     */
    public function addComment(
        Establishment $establishment,
        EstablishmentRepository $establishmentRepository,
        Request $request,
        SerializerInterface $serializer,
        Security $security,
        UserRepository $userRepository,
        ManagerRegistry $doctrine,
        ValidatorInterface $validator
    ) {
        // Put the comment received as comment object
        $comment = $serializer->deserialize($request->getContent(), Comment::class, 'json');

        $errors = $validator->validate($comment);

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

        // Put the current user in the comment
        $user = $security->getUser();
        //$user = $userRepository->find(1);
        $comment->setUser($user);
        $comment->setEstablishment($establishment);

        // Persist and flush the comment
        $entityManager = $doctrine->getManager();
        $entityManager->persist($comment);
        $entityManager->flush();

        // Call of the average rating method from EstablishmentRepository->averageRating()
        $rating = $establishmentRepository->averageRating($establishment->getId());
        $establishment->setRating($rating[0]['rating']);
        $entityManager->flush();

        return $this->json(['message'=> 'Commentaire créé avec succès.'], Response::HTTP_CREATED);
    }

}
