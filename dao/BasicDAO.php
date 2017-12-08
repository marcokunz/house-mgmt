<?php

namespace dao;

use database\Database;
use \PDO;

abstract class BasicDAO {
	/**
	 * @AttributeType PDO
	 */
    protected $pdoInstance;

    /**
     * @access public
     * @param PDO|null $pdoInstance
     * @ParamType pdoInstance PDO
     */
	public function __construct(PDO $pdoInstance = null) {
		if(is_null($pdoInstance)){
            $this->pdoInstance = Database::connect();
        } else {
            $this->pdoInstance = $pdoInstance;
        }
	}
}
