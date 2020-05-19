<?php

namespace App\Controller;

use App\Repository\PmaParametersRepository;
use App\Service\PmaParametersService;
use App\Service\PmaParametersServiceInterface;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PmaParametersController extends AbstractController
{
    /**
     * @var PmaParametersService
     */
    private $service;
    /**
     * @var EntityManagerInterface
     */
    private $manager;
    /**
     * @var PmaParametersRepository|ObjectRepository
     */
    private $repository;

    /**
     * PmaParametersController constructor.
     * @param PmaParametersServiceInterface $service
     * @param EntityManagerInterface $manager
     * @param PmaParametersRepository $repository
     */
    public function __construct(PmaParametersServiceInterface $service,
                                EntityManagerInterface $manager,
                                PmaParametersRepository $repository)
    {
        $this->service = $service;
        $this->manager = $manager;
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/pma", methods={"POST"})
     */
    public function store(Request $request) : Response
    {
        $corpoRequisicao = $request->getContent();
        $retorno = $this->service->criarParameter($corpoRequisicao);

        $this->manager->persist($retorno);
        $this->manager->flush();

        return new JsonResponse($retorno, Response::HTTP_CREATED);
    }

    /**
     * @return
     * @Route("/pma", methods={"GET"})
     */
    public function pegaTodos() : Response
    {
        return new JsonResponse($this->repository->findAll());
    }

    /**
     * @param int $id
     * @return Response
     * @Route("/pma/{id}", methods={"GET"})
     */
    public function pegaTodasOuAlgumas(int $id) : Response
    {
        return new JsonResponse($this->repository->find($id));
    }

    /**
     * @param int $id
     * @return Response
     * @Route("/pma/{id}", methods={"DELETE"})
     */
    public function remove(int $id) : Response
    {
        $pma = $this->repository->find($id);

        $this->manager->remove($pma);
        $this->manager->flush();

        return new Response('', Response::HTTP_NO_CONTENT);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return Response
     * @Route("/pma/{id}", methods={"PUT"})
     */
    public function atualiza(Request $request, $id) : Response
    {
        $corpoRequisicao = $request->getContent();
        $retorno = $this->service->criarParameter($corpoRequisicao);

        try {
            $pmaExistente = $this->repository->find($id);
            if (is_null($pmaExistente)){
                throw new \InvalidArgumentException();
            }
            $pmaExistente->setDescriptionCode($retorno->getDescriptionCode());
            $this->manager->persist($pmaExistente);
            $this->manager->flush();

            return new JsonResponse($pmaExistente);
        }catch (\InvalidArgumentException $exception){
            return new Response('', Response::HTTP_ACCEPTED);
        }
    }
}
