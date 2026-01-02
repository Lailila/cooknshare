<?php

/**
 * XSS protection:escape
 * 
 * @param string $str Target string
 * @param string Processed string
 */
function h($str){
  return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}

/**
 * CSRF protection: One-time Token
 * @param void
 * @return string $csrf_token
 */
function setToken(){
  //create Token
  //send Token from the form
  //check Token after submitting
  //delete Token
  $csrf_token = bin2hex(random_bytes(32));
  $_SESSION['csrf_token'] = $csrf_token;

  return $csrf_token;
}