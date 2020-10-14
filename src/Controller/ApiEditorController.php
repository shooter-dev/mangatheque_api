<?php

#   _____ __   __ ____   ____ _______ ______ _____        *
#  / ____| |  | |/ __ \ / __ \__   __|  ____|  __ \      **
# | (___ | |__| | |  | | |  | | | |  | |__  | |__) |    ***
#  \___ \|  __  | |  | | |  | | | |  |  __| |  _  /    ****
#  ____) | |  | | |__| | |__| | | |  | |____| | \ \   *****
# /_____/|_|  |_|\____/ \____/  |_|  |______|_|  \_\ ******
#                                          ***************************
#                                            ***********************
#                                              ****************_____  ________      __
#                                               *****    **** |  __ \|  ____\ \    / /
#                                              ***        *** | |  | | |__   \ \  / /
#                                             **           ** | |  | |  __|   \ \/ /
#                                            *              * | |__| | |____   \  /
#                                                             |_____/|______|   \/
# - Author       : shooterdev
# - Created      : 2020-10-13 06:20:56
# - project name :
# - Directory    : /Users/shooterdev/Projet/ShooterDev/LAB/PHP/mangatheque_api/src/Controller
# - Name         : ApiEditorController
# - File name    : ApiEditorController.py
# - Type         : class (ApiEditorController)
# - Namespace    :
########################################################################################################################

namespace App\Controller;

use App\Entity\Editor;
use App\Repository\EditorRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class ApiEditorController
 * @package App\Controller
 * @Route("/api")
 */
class ApiEditorController extends AbstractController
{
    /**
     * @Route("/editors", name="api_editors_collection", methods={"GET"})
     * @param EditorRepository $editorRepository
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function collection(EditorRepository $editorRepository, SerializerInterface $serializer): JsonResponse
    {
        return new JsonResponse(
            $serializer->serialize($editorRepository->findAll(), "json", ["groups" => "get"]),
            JsonResponse::HTTP_OK,
            [],
            true
        );
    }

    /**
     * @Route("/editor/{id}", name="api_editor_item", methods={"GET"} )
     * @param Editor $editor
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function item(Editor $editor, SerializerInterface $serializer): JsonResponse
    {
        return new JsonResponse(
            $serializer->serialize($editor, "json", ["groups" => "get"]),
            JsonResponse::HTTP_OK,
            [],
            true
        );
    }

    /**
     * @Route("/editor", name="api_editor_created", methods={"POST"})
     *
     * @param Request $request
     * @param SerializerInterface $serializer
     * @param UrlGeneratorInterface $url
     *
     * @return JsonResponse
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function created(Request $request, SerializerInterface $serializer, UrlGeneratorInterface $url): JsonResponse
    {
        $entityManager = $this->getDoctrine()->getManager();

        $editor = $serializer->deserialize(
            $request->getContent(),
            Editor::class,
            'json'
        );
        $entityManager->persist($editor);
        $entityManager->flush();

        return new JsonResponse(
            $serializer->serialize($editor, "json", ["groups" => "editor:read"]),
            JsonResponse::HTTP_CREATED,
            ["Location" => $url->generate("api_editor_item", ["id" => $editor->getId()])],
            true
        );
    }


    /**
     * @Route( "/editor/{id}",name="api_editor_update", methods={"PUT"} )
     *
     * @param Editor $editor
     * @param Request $request
     * @param SerializerInterface $serializer
     * @param EntityManagerInterface $entityManager
     * @return JsonResponse
     */
    public function update(
        Editor $editor,
        Request $request,
        SerializerInterface $serializer,
        EntityManagerInterface $entityManager
    ): JsonResponse {
        /** @var Editor $editor */
        $editor = $serializer->deserialize(
            $request->getContent(),
            Editor::class,
            'json',
            [AbstractNormalizer::OBJECT_TO_POPULATE => $editor]
        );

        $entityManager->flush();

        return new JsonResponse(
            null,
            JsonResponse::HTTP_NO_CONTENT
        );
    }

    /**
     * @Route( "/editor/{id}",name="api_editor_delete", methods={"DELETE"} )
     *
     * @param Editor $editor
     * @param EntityManagerInterface $entityManager
     * @return JsonResponse
     */
    public function delete(
        Editor $editor,
        EntityManagerInterface $entityManager
    ): JsonResponse {

        $entityManager->remove($editor);
        $entityManager->flush();

        return new JsonResponse(
            null,
            JsonResponse::HTTP_NO_CONTENT
        );
    }
}
