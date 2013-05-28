<?php
namespace S9\Quayo\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "S9.Quayo".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

use TYPO3\Flow\Mvc\Controller\ActionController;
use \S9\Quayo\Domain\Model\Inquiry;

/**
 * Inquiry controller for the S9.Quayo package 
 *
 * @Flow\Scope("singleton")
 */
class InquiryController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \S9\Quayo\Domain\Repository\InquiryRepository
	 */
	protected $inquiryRepository;

	/**
	 * Shows a list of inquiries
	 *
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('inquiries', $this->inquiryRepository->findAll());
	}

	/**
	 * Shows a single inquiry object
	 *
	 * @param \S9\Quayo\Domain\Model\Inquiry $inquiry The inquiry to show
	 * @return void
	 */
	public function showAction(Inquiry $inquiry) {
		$this->view->assign('inquiry', $inquiry);
	}

	/**
	 * Shows a form for creating a new inquiry object
	 *
	 * @return void
	 */
	public function newAction() {
	}

	/**
	 * Adds the given new inquiry object to the inquiry repository
	 *
	 * @param \S9\Quayo\Domain\Model\Inquiry $newInquiry A new inquiry to add
	 * @return void
	 */
	public function createAction(Inquiry $newInquiry) {
		$this->inquiryRepository->add($newInquiry);
		$this->addFlashMessage('Created a new inquiry.');
		$this->redirect('index');
	}

	/**
	 * Shows a form for editing an existing inquiry object
	 *
	 * @param \S9\Quayo\Domain\Model\Inquiry $inquiry The inquiry to edit
	 * @return void
	 */
	public function editAction(Inquiry $inquiry) {
		$this->view->assign('inquiry', $inquiry);
	}

	/**
	 * Updates the given inquiry object
	 *
	 * @param \S9\Quayo\Domain\Model\Inquiry $inquiry The inquiry to update
	 * @return void
	 */
	public function updateAction(Inquiry $inquiry) {
		$this->inquiryRepository->update($inquiry);
		$this->addFlashMessage('Updated the inquiry.');
		$this->redirect('index');
	}

	/**
	 * Removes the given inquiry object from the inquiry repository
	 *
	 * @param \S9\Quayo\Domain\Model\Inquiry $inquiry The inquiry to delete
	 * @return void
	 */
	public function deleteAction(Inquiry $inquiry) {
		$this->inquiryRepository->remove($inquiry);
		$this->addFlashMessage('Deleted a inquiry.');
		$this->redirect('index');
	}

}

?>