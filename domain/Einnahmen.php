<?php
namespace domain;
/**
 * @access public
 * @author marcokunz
 */
class Einnahmen {
	/**
	 * @AttributeType Date
	 */
	private $_datum;
	/**
	 * @AttributeType BigDecimal
	 */
	private $_betrag;
	/**
	 * @AssociationType Mieter
	 * @AssociationMultiplicity 1
	 */
	public $_mieter;
}
?>