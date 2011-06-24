<?php

/**
 * This class manages the execution of a single Job.
 *
 */
class Executor {

	private $job;

	/**
	 * Constructor.
	 * 
	 * @param Job $job the job to be executed.
	 */
	public function __construct(Job $job) {
		$this->job = $job;
	}

	/**
	 * Call this function to execute job.
	 * 
	 * @return TaskResponse response - an object containing http response code
	 * 			status and the response string returned from job server.
	 */
	public function run() {
				
		// Update 'LastExecution' time for this job.
		$this->updateLastExecutionTime();
		
		// Execute the job by calling its url.
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->job->getUrl());
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->job->getTimeout());
		$html = curl_exec($ch);
		
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		
		$response = new JobResponse($http_code, $html);
		return $response;
	}
	
	/**
	 * Helper function: updates 'LastExecution' value in database for this job.
	 */
	private function updateLastExecutionTime() {
		
		// Use php time (in case it differs from time on the db server)
		$now = date( 'Y-m-d H:i:s', time() );
		$dao = new JobDao();
		$this->job->setLastExecution($now);
		$dao->save($this->job);
	}	
}
