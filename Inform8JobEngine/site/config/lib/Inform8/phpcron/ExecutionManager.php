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
	 * @param JobFinder $jobFinder - an object that implements the JobFinder interface.
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

			// TODO Should jobs be locked prior to running them?

			$start = date( 'Y-m-d H:i:s', time() );			
			$executor = new Executor($job);
			$response = $executor->run();
			$finish = date( 'Y-m-d H:i:s', time() );			
			
			$this->addJobToHistory($job, $response, $start, $finish);
			
			$this->sendNotifications($job, $response, $start, $finish);
		}
	}

	/**
	 * Helper function: email job response to administrator.
	 * 
	 * @param Job $job
	 * @param JobResponse $response
	 */
	private function sendNotifications(Job $job, JobResponse $response, $start, $finish) {

		if ( $job->getEmail() != "" ) {

			$to = $job->getEmail();

			$subject = "JOB STATUS: " . $job->getJobName();
			
			if ($response->http_code() == 0) {
				$subject .= ": ERROR - UNABLE TO CONTACT JOB SERVER";
			}
			
			$body = $this->jobInfoToString($job, $response, $start, $finish); 
			
			// TODO: Delete following 7 lines
			print "To: " . $to . "<br />";
			print "Subject: " . $subject . "<br />";
			$body = explode ("\n", $body);
			foreach ($body as $line) {
				print "$line<br />";
			}
			print "<br />";
			
			// TODO: Uncomment next 2 lines
			//$mailer = new SimpleMailer();
			//$mailer->sendPlainTextEmail($to, $subject, $body);
		}		
	}

	/**
	 * Helper function: Add job to history table in db
	 *  
	 * @param Job $job
	 * @param JobResponse $response
	 * @param String $start
	 * @param String $finish
	 */
	private function addJobToHistory(Job $job, JobResponse $response, $start, $finish) {
	
		$history = new JobHistory();
		$history->setJobInfo($this->jobInfoToString($job, $response, $start, $finish));
		$history->setStartTime($start);
		$history->setFinishTime($finish);
		$history->setHttpCode($response->http_code());
		$history->setMessage($response->message());
		$dao = new JobHistoryDao();
		$dao->create($history);
	}
	
	/**
	 * Helper function: convert Job, Job Response and start/ finish times to string
	 *  format for emailing & stashing in job history db table.
	 * 
	 * @param Job $job
	 * @param String $start
	 * @param String $finish
	 */
	private function jobInfoToString(Job $job, JobResponse $response, $start, $finish) {
		
		$string = 
			"Job url: " . $job->getUrl() . "\n" .
	  		"Job name: " . $job->getJobName() . "\n" .
	  		"Job id: " . $job->getJobId() . "\n" .
			"Timeout: " . $job->getTimeout(). "\n" .
			"Delay: " . $job->getDelay() . "\n" .
	 		"Job started: " . $start . "\n" .
	 		"Job finished: " . $finish . "\n" .
	 		"JOB SERVER RESPONSE:\n" .
	 		"Http response status: " . $response->http_code() . "\n" . 
	 		"Message: " . $response->message() . "\n"; 

		return $string;
	}
}
