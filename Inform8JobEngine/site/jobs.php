<?php
/**
 * Copyright 2011 - Inform8
 * http://www.inform8.com
 *
 * Licensed under the Apache License, Version 2.0 (the "License")
 * http://www.apache.org/licenses/LICENSE-2.0
 */

require_once 'config/settings.php';

$job = Request::getSafeGetOrPost("job");
if (ctype_alpha($job)) {
  		
    $regJob = file_exists('config/phpcron/' . $job . '.job.php');

	if ($regJob) {
      	BasicLogger::logToFile('Running local job: '. $job . '.job.php');
      	include 'config/phpcron/' . $job . '.job.php';      
    }
}
?>