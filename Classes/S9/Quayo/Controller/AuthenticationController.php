<?php
namespace S9\Quayo\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "S9.Quayo".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

/**
 * Authentication controller for the S9.Quayo package 
 *
 * @Flow\Scope("singleton")
 */
class AuthenticationController extends \TYPO3\Flow\Security\Authentication\Controller\AbstractAuthenticationController {

	/**
	 * Redirects to a potentially intercepted request. Returns an error message if there has been none.
	 *
	 * @param \TYPO3\Flow\Mvc\ActionRequest $originalRequest The request that was intercepted by the security framework, NULL if there was none
	 * @return string
	 */
	protected function onAuthenticationSuccess(\TYPO3\Flow\Mvc\ActionRequest $originalRequest = NULL) {
		$this->addFlashMessage('Successfully logged in');
		if ($originalRequest !== NULL) {
			$this->addFlashMessage('Redirecting to original request');
			$this->redirectToRequest($originalRequest);
		}
		$this->addFlashMessage('Redirecting to Standard/index');
		$this->redirect('index','Standard');
	}
	
	
	public function logoutAction() {
		$this->authenticationManager->logout();
		$this->addFlashMessage('Successfully logged out.');
		$this->addFlashMessage('Redirecting to Standard/index');
		$this->redirect('index', 'Standard');
	}

}

?>