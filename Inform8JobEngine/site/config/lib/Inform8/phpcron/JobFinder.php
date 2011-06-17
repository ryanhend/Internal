<?php

/**
 * An interface for classes that find Jobs.
 * 
 * Jobs could be retrieved from a data base, text file, web service, etc.
 *
 */
interface JobFinder
{
    /**
     * Find all Jobs that should be executed now.
     * 
     * @return 
	 * 			NULL if there are no jobs scheduled to be executed now.
	 * 			Array of Job objects if there are Jobs ready to be executed.
     * 
     */
    public function find ();
}

