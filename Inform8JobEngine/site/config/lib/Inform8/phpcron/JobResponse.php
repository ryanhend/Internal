<?php

/**
 * This class encapsulates the outcome of an executed Job.
 *
 */
class JobResponse {

	/** HTTP response status code received from Job server. */
	private $http_code;
	
	/** The response string received from Job server */
	private $html;

	/**
	 * Constructor.
	 * 
	 * @param Int - the HTTP status code received from the job server.
	 * @param String - the response string received from the job server.
	 * 
	 */
	public function __construct($http_code, $html) {
		$this->http_code = $http_code;
		$this->html = $html;
	}

	/**
	 * Return HTTP response status code.
	 *
	 * @return
	 * 			Integer value indicating HTTP response status code.
	 * 			0 if the job server was uncontactable.
	 */
	public function http_code() {
		return $this->http_code;
	}
	
	/**
	 * Return response string sent by Job server.
	 *
	 * @return String - the response string sent by Job server.
	 */
	public function html() {
		return $this->html;
	}
}