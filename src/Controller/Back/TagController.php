<?php

namespace App\Controller\Back;

use App\Entity\Tag;
use App\Form\TagType;
use App\Repository\TagRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("specialites")
 */
class TagController extends AbstractController
{
    /**
     * @Route("", name="app_back_tag", methods={"GET"})
     */
    public function index(TagRepository $tagRepository): Response
    {
        return $this->render('tag/index.html.twig', [
            'tags' => $tagRepository->findAll(),
        ]);
    }

    /**
     * 
     * Method used to add a new tag
     * 
     * @Route("/ajouter", name="back_tag_new", methods={"GET", "POST"})
     */
    public function new(Request $request, TagRepository $tagRepository): Response
    {
        $tag = new Tag();
        $form = $this->createForm(TagType::class, $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $tagRepository->add($tag);
            $this->addFlash('success', 'Spécialités ajouté.');
            return $this->redirectToRoute('app_back_tag', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tag/new.html.twig', [
            'tag' => $tag,
            'form' => $form,
        ]);
    }
    /**
     * 
     * Method used to list establishments by tags
     * 
     * @Route("/{id}", name="back_tag_show", methods={"GET"})
     */
    public function show(Tag $tag): Response
    {
        return $this->render('tag/show.html.twig', [
            'tag' => $tag,
        ]);
    }

    

    /**
     * 
     * Method used to edit a new tag
     * 
     * @Route("/{id}/editer", name="back_tag_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Tag $tag, TagRepository $tagRepository): Response
    {
        $form = $this->createForm(tagType::class, $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $tagRepository->add($tag);
            $this->addFlash('success', 'spécialitée modifié.');
            return $this->redirectToRoute('app_back_tag', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tag/edit.html.twig', [
            'tag' => $tag,
            'form' => $form,
        ]);
    }

    /**
     * 
     * Method used to edit a new tag
     * 
     * @Route("/{id}", name="back_tag_delete", methods={"POST"})
     */
    public function delete(Request $request, Tag $tag, TagRepository $tagRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tag->getId(), $request->request->get('_token'))) {
            $tagRepository->remove($tag);
            $this->addFlash('success', 'Spécialitée supprimé.');
        }

        return $this->redirectToRoute('app_back_tag', [], Response::HTTP_SEE_OTHER);
    }
}
