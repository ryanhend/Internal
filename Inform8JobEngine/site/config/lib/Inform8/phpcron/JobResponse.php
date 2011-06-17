<?php

/**
 * This class is used to encapsulate the response string returned by an executed Job.
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
	 * @param Int $http_code the HTTP status code received from the job server.
	 * @param String $html the response string received from the job server.
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
	 * 			0 if the job server was uncontactable.
	 * 			Integer value indicating HTTP response status code.
	 */
	public function http_code() {
		return $this->http_code;
	}
	
	/**
	 * Return response string returned by Job server.
	 *
	 * @return String response string sent by Job server.
	 */
	public function html() {
		return $this->html;
	}
}