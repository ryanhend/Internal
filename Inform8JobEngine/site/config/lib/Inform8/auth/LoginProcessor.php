<?php
/**
 * Copyright 2011 - Inform8
 * http://www.inform8.com
 *
 * Licensed under the Apache License, Version 2.0 (the "License")
 * http://www.apache.org/licenses/LICENSE-2.0
 */

interface LoginProcessor {

  public function processLogin($user);

  public function processLogout($user);

  public function processUnsuccessfulLogin($username, $password);

  public function recordLoginAttempt($username, $password);

}


class NullLoginProcessor implements LoginProcessor {

  public function processLogin($user) {}

  public function processLogout($user) {}

  public function processUnsuccessfulLogin($username, $password) {}

  public function recordLoginAttempt($username, $password){}

}


?>