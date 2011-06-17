<?php

/**
 * This class manages the execution of tasks.
 *
 */
class ExecutionManager {
	
	private $jobFinder;
		
	/**
	 * Constructor.
	 * 
	 * @param JobFinder $jobFinder 
	 * 
	 */
	public function __construct(JobFinder $jobFinder) {
		$this->jobFinder = $jobFinder;
	}	
	
	/**
	 * Call this function to execute jobs which are due to occur now.
	 */
	public function run() {

		$jobs = $this->jobFinder->find();
		
		if ( is_null($jobs)  ) {
			return;
		}
		
		foreach ($jobs as $job) {

			// Execute a job.
			$executor = new Executor($job);
			$response = $executor->run();

			// notify the admin.
			$this->notify($job, $response);
		}
	}
	
	/**
	 * Helper function: send an email about job to administrator.
	 * 
	 * @param Job $job
	 * @param JobResponse $response
	 */
	private function notify(Job $job, JobResponse $response) {

		if ( $job->getEmail() != "" ) {

			$to = $job->getEmail();

			$subject = "Job notification";
			
			// Job server uncontactable?
			if ($response->http_code() == 0) {
				$subject .= ": ERROR - UNABLE TO CONTACT JOB SERVER";
			}
			
			$body = "Job details:\n\n" .
			  		"Job id: " . $job->getJobId() . "\n" .
					"Job url: " . $job->getUrl() . "\n" .
			  		"Timeout: " . $job->getTimeout(). "\n" .
					"Delay: " . $job->getDelay() . "\n" .
			 		"Execution time: " . $job->getLastExecution() . "\n\n" .
			 		"Job response:\n\n" .
			 		"HTTP response status code: " . $response->http_code() . "\n" . 
			 		"Message received from job server:\n" .
			 		$response->html() . "\n"; 
			 		
			// TODO: Uncomment this
			//$mailer = new SimpleMailer();
			//$mailer->sendPlainTextEmail($to, $subject, $body);
			 		
			// TODO: DELETE THIS
			print "To: " . $to . "<br />";
			print "Subject: " . $subject . "<br />";
			print "Body: <br />" . $body . "<br /><br />";
			
		}		
	}
}
