<?php
namespace S9\Quayo\Service;
use Symfony\Component\DomCrawler\Crawler;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Fluid".                 *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */
use TYPO3\Flow\Annotations as Flow;

/**
 * Common base class for search indexer.
 */
class GoogleRunner {
	

	/**
	 * @var \TYPO3\Flow\Log\SystemLoggerInterface
	 * @Flow\Inject
	 */
	protected $systemLogger;
	

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Http\Client\Browser
	 */
	protected $browser;
	
	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Http\Client\CurlEngine
	 */
	protected $browserRequestEngine;
	

	/**
	 * @var array
	 */
	protected $settings;


	/**
	 * Inject the settings
	 *
	 * @param array $settings
	 * @return void
	 */
	public function injectSettings(array $settings) {
		$this->settings = $settings;
	}


	/**
	  * @param @var \S9\Quayo\Domain\Model\Inquiry $inquiry
	  * @return @var \S9\Quayo\Domain\Model\InquiryResult
	  */
	public function run($inquiry) {
		/*
		$user_agent = ini_get ( 'user_agent' );
		ini_set ( 'user_agent', $this->settings['Runners']['Defaults']['userAgent'] );
		include_once FLOW_PATH_PACKAGES . 'S9.Quayo/Resources/Php/simple_html_dom.php';
		die ( print_r ( $this->settings['Runners']['Defaults']['userAgent'] ) );
		ini_set ( 'user_agent', $user_agent );
		*/
		$this->browser->setRequestEngine ( $this->browserRequestEngine );
		

		$q = $inquiry->getSearchTerm ();
		

		$this->systemLogger->log ( 'getSearchTerm is: ' . $q, LOG_DEBUG );
		$this->systemLogger->log ( 'maxResults is: ' . $this->settings ['Runners'] ['Google'] ['maxResults'], LOG_DEBUG );
		
		for($r = 0; $r < $this->settings ['Runners'] ['Google'] ['maxResults'];) {
			$uri = sprintf ( $this->settings ['Runners'] ['Google'] ['uri'], $q, $r );
			$this->systemLogger->log ( 'uri is: ' . $uri, LOG_DEBUG );
			$resultsCount = 10;
			
			$response = $this->browser->request ( $uri );
			die ( $response->getContent () );
			

			$r = $r + $resultsCount;
		}
		
		// @var \S9\Quayo\Domain\Model\InquiryResult
		$newInquiryResult = new \S9\Quayo\Domain\Model\InquiryResult ();
		$newInquiryResult->setInquiry ( $inquiry );
		$newInquiryResult->setExecutionTime ( new \DateTime () );
		$newInquiryResult->setRank ( rand ( 1, 200 ) );
		
		return $newInquiryResult;
	}

}
?>