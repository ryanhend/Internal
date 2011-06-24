<?php

/**
 * This class retrieves scheduled Jobs from the database.
 *
 */
class DBFinder implements JobFinder {		

	/**
	 * Return all jobs that should be run right now.
	 * 
	 * @return
	 * 			NULL if there are no jobs scheduled to be executed now.
	 * 			Array of Job objects if there are Jobs ready to be executed.
	 */
	public function find() {

		$dao = new JobDao();

		// Use php time (in case it differs from time on the db server)
		$now = date('Y-m-d H:i:s', time());
		$tasks = $dao->getWithSql("SELECT * FROM Job WHERE '$now' > ( `LastExecution` + INTERVAL `Delay` SECOND )", false);

		return $tasks;
	}	
}
