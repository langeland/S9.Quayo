<?php
namespace S9\Quayo\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "S9.Quayo".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Account
 *
 * @Flow\Entity
 */
class Account {

	/**
	 * The name
	 * @var string
	 */
	protected $name;


	/**
	 * Get the Account's name
	 *
	 * @return string The Account's name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets this Account's name
	 *
	 * @param string $name The Account's name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

}
?>