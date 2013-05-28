<?php
namespace S9\Quayo\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "S9.Quayo".              *
 *                                                                        *
 *                                                                        */
use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Inquiry result
 *
 * @Flow\Entity
 */
class InquiryResult {
	
	/**
	 * @var \S9\Quayo\Domain\Model\Inquiry
	 * @ORM\ManyToOne
	 */
	protected $inquiry;
	
	/**
	 * @var \DateTime
	 */
	protected $executionTime;
	
	/**
	 * @var integer
	 */
	protected $rank;


	/**
	 * @return \S9\Quayo\Domain\Model\Inquiry $inquiry
	 */
	public function getInquiry() {
		return $this->inquiry;
	}


	/**
	 * @param \S9\Quayo\Domain\Model\Inquiry $inquiry
	 */
	public function setInquiry($inquiry) {
		$this->inquiry = $inquiry;
	}


	/**
	 * @return DateTime $executionTime
	 */
	public function getExecutionTime() {
		return $this->executionTime;
	}


	/**
	 * @param DateTime $executionTime
	 */
	public function setExecutionTime($executionTime) {
		$this->executionTime = $executionTime;
	}


	/**
	 * @return number $rank
	 */
	public function getRank() {
		return $this->rank;
	}


	/**
	 * @param number $rank
	 */
	public function setRank($rank) {
		$this->rank = $rank;
	}

}
?>