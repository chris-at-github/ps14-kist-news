<?php

if(defined('TYPO3') === false) {
	die('Access denied.');
}

call_user_func(function()	{
	// @see: https://docs.typo3.org/p/georgringer/news/11.4/en-us/Tutorials/ExtendNews/ProxyClassGenerator/Index.html#2-register-the-class
	$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['classes']['Domain/Model/News']['ps14_kist_news'] = 'ps14_kist_news';
});