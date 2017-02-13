<?php

namespace ifirma;

/**
 * Description of MessageManager
 *
 * @author bbojanowicz
 */


class InternalComunicationManager {
	
	const SESSION_KEY = 'IFIRMA_MODULE_INTERNAL_COMUNICATION';
	
	const KEY_SEND_RESULT = 'send-result';
	const KEY_INVOICE_VALIDATION_MESAGE = 'invoice-validation-message';
	
	/**
	 *
	 * @var InternalComunicationManager
	 */
	private static $_instance;
	
	private function __construct(){

		
		session_write_close();
        session_start(); 

	}
	
	/**
	 * @return InternalComunicationManager
	 */
	public static function getInstance(){
		

		if(self::$_instance === null){
			self::$_instance = new self();
			
		}

		return self::$_instance;
	}
	
	/**
	 * @param string $name
	 * @param mixed $value
	 * @return \ifirma\InternalComunicationManager
	 */
	
	public function __set($name, $value) {
		$_SESSION[self::SESSION_KEY][$name] = $value;
		return $this;
	}
	
	/**
	 * Returns and removes value from session
	 * @param string $name
	 * @return mixed|null
	 */
	
	public function __get($name) {
		if(isset($_SESSION[self::SESSION_KEY][$name])){
			$value = $_SESSION[self::SESSION_KEY][$name];
			unset($_SESSION[self::SESSION_KEY][$name]);
			return $value;
		}
		return null;
	}
}

