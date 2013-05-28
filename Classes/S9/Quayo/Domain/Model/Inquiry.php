<?php
namespace S9\Quayo\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "S9.Quayo".              *
 *                                                                        *
 *                                                                        */
use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Inquiry
 *
 * @Flow\Entity
 */
class Inquiry {
	
	/**
	 * The name
	 * @var string
	 */
	protected $name;
	
	/**
	 * @var string
	 */
	protected $description;
	
	/**
	 * @var string
	 */
	protected $searchTerm;
	
	/**
	 * @var string
	 */
	protected $searchDomain;
	
	/**
	 * @var integer
	 * @ORM\Column(nullable=TRUE)
	 */
	protected $status;
	
	/**
	 * @var \DateTime
	 * @ORM\Column(nullable=TRUE)
	 */
	protected $lastExecution;
	
	/**
	 * @var \S9\Quayo\Domain\Model\Account
	 * @ORM\ManyToOne
	 */
	protected $owner;
	
	/**
	 * @var \S9\Quayo\Domain\Model\InquiryResult
	 * @ORM\OneToMany
	 * (mappedBy="inquiry")
	 */
	protected $results;
	


	/**
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}


	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}


	/**
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}


	/**
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}


	/**
	 * @return string $searchTerm
	 */
	public function getSearchTerm() {
		return $this->searchTerm;
	}


	/**
	 * @param string $searchTerm
	 */
	public function setSearchTerm($searchTerm) {
		$this->searchTerm = $searchTerm;
	}


	/**
	 * @return string $searchDomain
	 */
	public function getSearchDomain() {
		return $this->searchDomain;
	}


	/**
	 * @param string $searchDomain
	 */
	public function setSearchDomain($searchDomain) {
		$this->searchDomain = $searchDomain;
	}


	/**
	 * @return number $status
	 */
	public function getStatus() {
		return $this->status;
	}


	/**
	 * @param number $status
	 */
	public function setStatus($status) {
		$this->status = $status;
	}


	/**
	 * @return DateTime $lastExecution
	 */
	public function getLastExecution() {
		return $this->lastExecution;
	}


	/**
	 * @param DateTime $lastExecution
	 */
	public function setLastExecution($lastExecution) {
		$this->lastExecution = $lastExecution;
	}
	



}
?>