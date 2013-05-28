<?php
namespace S9\Quayo\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "S9.Quayo".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

use TYPO3\Flow\Mvc\Controller\ActionController;
use \S9\Quayo\Domain\Model\InquiryResult;

/**
 * InquiryResult controller for the S9.Quayo package 
 *
 * @Flow\Scope("singleton")
 */
class InquiryResultController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \S9\Quayo\Domain\Repository\InquiryResultRepository
	 */
	protected $inquiryResultRepository;

	/**
	 * Shows a list of inquiry results
	 *
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('inquiryResults', $this->inquiryResultRepository->findAll());
	}

	/**
	 * Shows a single inquiry result object
	 *
	 * @param \S9\Quayo\Domain\Model\InquiryResult $inquiryResult The inquiry result to show
	 * @return void
	 */
	public function showAction(InquiryResult $inquiryResult) {
		$this->view->assign('inquiryResult', $inquiryResult);
	}

	/**
	 * Shows a form for creating a new inquiry result object
	 *
	 * @return void
	 */
	public function newAction() {
	}

	/**
	 * Adds the given new inquiry result object to the inquiry result repository
	 *
	 * @param \S9\Quayo\Domain\Model\InquiryResult $newInquiryResult A new inquiry result to add
	 * @return void
	 */
	public function createAction(InquiryResult $newInquiryResult) {
		$this->inquiryResultRepository->add($newInquiryResult);
		$this->addFlashMessage('Created a new inquiry result.');
		$this->redirect('index');
	}

	/**
	 * Shows a form for editing an existing inquiry result object
	 *
	 * @param \S9\Quayo\Domain\Model\InquiryResult $inquiryResult The inquiry result to edit
	 * @return void
	 */
	public function editAction(InquiryResult $inquiryResult) {
		$this->view->assign('inquiryResult', $inquiryResult);
	}

	/**
	 * Updates the given inquiry result object
	 *
	 * @param \S9\Quayo\Domain\Model\InquiryResult $inquiryResult The inquiry result to update
	 * @return void
	 */
	public function updateAction(InquiryResult $inquiryResult) {
		$this->inquiryResultRepository->update($inquiryResult);
		$this->addFlashMessage('Updated the inquiry result.');
		$this->redirect('index');
	}

	/**
	 * Removes the given inquiry result object from the inquiry result repository
	 *
	 * @param \S9\Quayo\Domain\Model\InquiryResult $inquiryResult The inquiry result to delete
	 * @return void
	 */
	public function deleteAction(InquiryResult $inquiryResult) {
		$this->inquiryResultRepository->remove($inquiryResult);
		$this->addFlashMessage('Deleted a inquiry result.');
		$this->redirect('index');
	}

}

?>