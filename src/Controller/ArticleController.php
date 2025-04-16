<?php

// src/Controller/ArticleController.php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="article_list")
     */
    public function list(EntityManagerInterface $entityManager): Response
    {
        $articles = $entityManager->getRepository(Article::class)->findAll();

        return $this->render('article/list.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/articles/new", name="article_new")
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $article->setCreatedAt(new \DateTime());
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('article_list');
        }

        return $this->render('article/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/articles/{id}/delete", name="article_delete")
     */
    public function delete(Article $article, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($article);
        $entityManager->flush();

        return $this->redirectToRoute('article_list');
    }
}
