<?php
namespace domain;
/**
 * @access public
 * @author marcokunz
 */
class Kosten {
	/**
	 * @AttributeType String
	 */
	private $_typ;
	/**
	 * @AttributeType int
	 */
	private $_betrag;
	/**
	 * @AssociationType Rechnungen
	 * @AssociationMultiplicity 1
	 */
	public $_rechnungen;
}
?>