<?php
namespace S9\Quayo\Command;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "S9.Quayo".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

/**
 * Execution command controller for the S9.Quayo package
 *
 * @Flow\Scope("singleton")
 */
class QuayoCommandController extends \TYPO3\Flow\Cli\CommandController {
	
	
	/**
	 * @Flow\Inject
	 * @var \S9\Quayo\Domain\Repository\InquiryRepository
	 */
	protected $inquiryRepository;
	
	/**
	 * @Flow\Inject
	 * @var \S9\Quayo\Domain\Repository\InquiryResultRepository
	 */
	protected $inquiryResultRepository;
	
	/**
	 * @Flow\Inject
	 * @var \S9\Quayo\Service\GoogleRunner
	 */
	protected $runner;
	

	/**
	 * An example command
	 *
	 * The comment of this command method is also used for TYPO3 Flow's help screens. The first line should give a very short
	 * summary about what the command does. Then, after an empty line, you should explain in more detail what the command
	 * does. You might also give some usage example.
	 *
	 * It is important to document the parameters with param tags, because that information will also appear in the help
	 * screen.
	 *
	 * @param string $optionalArgument This argument is optional
	 * @return void
	 */
	public function runCommand($optionalArgument = NULL) {
		
		$inquirys = $this->inquiryRepository->findAll();
		
		
		
		foreach ($inquirys as $inquiry) {
			$this->runner->run($inquiry);
			
			// @var \S9\Quayo\Domain\Model\InquiryResult
			$newInquiryResult = new \S9\Quayo\Domain\Model\InquiryResult();
			
			$newInquiryResult->setInquiry($inquiry);
			$newInquiryResult->setExecutionTime(new \DateTime());
			$newInquiryResult->setRank(rand(1, 200));
			
			$this->inquiryResultRepository->add($newInquiryResult);
			
			$this->outputLine('Creating results for Inquiry: ' . $inquiry->getName() . '. Rank is: ' . $newInquiryResult->getRank());
		}
		
		
		$this->outputLine('Done..');
	}

	/**
	 * An example command
	 *
	 * The comment of this command method is also used for TYPO3 Flow's help screens. The first line should give a very short
	 * summary about what the command does. Then, after an empty line, you should explain in more detail what the command
	 * does. You might also give some usage example.
	 *
	 * It is important to document the parameters with param tags, because that information will also appear in the help
	 * screen.
	 *
	 * @param string $requiredArgument This argument is required
	 * @param string $optionalArgument This argument is optional
	 * @return void
	 */
	public function exampleCommand($requiredArgument, $optionalArgument = NULL) {
		$this->outputLine('You called the example command and passed "%s" as the first argument.', array($requiredArgument));
	}

}

?>