<?php
namespace S9\Quayo\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "S9.Quayo".              *
 *                                                                        *
 *                                                                        */
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use \S9\Quayo\Domain\Model\Account;

/**
 * Account controller for the S9.Quayo package 
 *
 * @Flow\Scope("singleton")
 */
class AccountController extends ActionController {
	

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Security\AccountFactory
	 */
	var $accountFactory;
	

	/**
	 * @Flow\Inject
	 * @var TYPO3\Flow\Security\AccountRepository
	 */
	var $accountRepository;


	/**
	 * Shows a list of accounts
	 *
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign ( 'accounts', $this->accountRepository->findAll () );
	}


	/**
	 * Shows a single account object
	 *
	 * @param \S9\Quayo\Domain\Model\Account $account The account to show
	 * @return void
	 */
	public function showAction(Account $account) {
		$this->view->assign ( 'account', $account );
	}


	/**
	 * Shows a form for creating a new account object
	 *
	 * @return void
	 */
	public function newAction() {
	}


	/**
	 * Adds the given new account object to the account repository
	 *
	 * @param string $identifier
	 * @param string $password
	 * @return void
	 */
	public function createAction($identifier, $password) {
		$roles = array (
				'Administrator' 
		);
		$authenticationProviderName = 'DefaultProvider';
		
		$account = $this->accountFactory->createAccountWithPassword ( $identifier, $password, $roles, $authenticationProviderName );
		$this->accountRepository->add ( $account );
		$this->addFlashMessage ( 'Created a new account.' );
		$this->redirect ( 'index' );
	}


	/**
	 * Shows a form for editing an existing account object
	 *
	 * @param \S9\Quayo\Domain\Model\Account $account The account to edit
	 * @return void
	 */
	public function editAction(Account $account) {
		$this->view->assign ( 'account', $account );
	}


	/**
	 * Updates the given account object
	 *
	 * @param \S9\Quayo\Domain\Model\Account $account The account to update
	 * @return void
	 */
	public function updateAction(Account $account) {
		$this->accountRepository->update ( $account );
		$this->addFlashMessage ( 'Updated the account.' );
		$this->redirect ( 'index' );
	}


	/**
	 * Removes the given account object from the account repository
	 *
	 * @param \S9\Quayo\Domain\Model\Account $account The account to delete
	 * @return void
	 */
	public function deleteAction(Account $account) {
		$this->accountRepository->remove ( $account );
		$this->addFlashMessage ( 'Deleted a account.' );
		$this->redirect ( 'index' );
	}

}

?>