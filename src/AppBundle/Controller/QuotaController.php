<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Quota;
use AppBundle\Repository\QuotaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Quotum controller.
 *
 * @Route("quotas")
 */
class QuotaController extends Controller
{
    /**
     * Lists all quota entities.
     *
     * @Route("/", name="quota_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        /** @var QuotaRepository $quotaRepository */
        $quotaRepository = $this->get('AppBundle\Repository\QuotaRepository');

        $quotas = $quotaRepository->getAll();
        return $this->render('quota/index.html.twig', array(
            'quotas' => $quotas,
        ));
    }

    /**
     * Creates a new quota entity.
     *
     * @Route("/new", name="quota_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        /** @var QuotaRepository $quotaRepository */
        $quotaRepository = $this->get('AppBundle\Repository\QuotaRepository');

        $quota = new Quota();
        $form = $this->createForm('AppBundle\Form\QuotaType', $quota);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $quota = $quotaRepository->Create($quota);

            return $this->redirectToRoute('quota_index', array('result' => 'added'));
        }

        return $this->render('quota/new.html.twig', array(
            'quota' => $quota,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a quota entity.
     *
     * @Route("/{id}", name="quota_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        /** @var QuotaRepository $quotaRepository */
        $quotaRepository = $this->get('AppBundle\Repository\QuotaRepository');
        
        $quota = $quotaRepository->Get($id);

        return $this->render('quota/show.html.twig', array(
            'quota' => $quota,
        ));
    }

    /**
     * Displays a form to edit an existing quota entity.
     *
     * @Route("/{id}/edit", name="quota_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, $id)
    {
        /** @var QuotaRepository $quotaRepository */
        $quotaRepository = $this->get('AppBundle\Repository\QuotaRepository');

        $quota = $quotaRepository->Get($id);
        $editForm = $this->createForm('AppBundle\Form\QuotaType', $quota);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $quota = $quotaRepository->Update($quota);

            return $this->redirectToRoute('quota_index', array('result' => 'edited'));
        }

        return $this->render('quota/edit.html.twig', array(
            'quota' => $quota,
            'form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a quota entity.
     *
     * @Route("/{id}/delete", name="quota_delete")
     */
    public function deleteAction(Request $request, $id)
    {
        /** @var QuotaRepository $quotaRepository */
        $quotaRepository = $this->get('AppBundle\Repository\QuotaRepository');

        $quota = $quotaRepository->Get($id);

        $quotaRepository->delete($quota);

        return $this->redirectToRoute('quota_index', array('result' => 'deleted'));
    }

}
