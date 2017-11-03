<?php
namespace domain;
/**
 * @access public
 * @author marcokunz
 */
class Rechnungen {
	/**
	 * @AttributeType int
	 */
	private $_id;
	/**
	 * @AttributeType String
	 */
	private $_typ;
	/**
	 * @AttributeType String
	 */
	private $_betrag;
	/**
	 * @AttributeType Date
	 */
	private $_datum;
	/**
	 * @AssociationType Kosten
	 * @AssociationMultiplicity 1
	 */
	public $_kosten;
}
?>