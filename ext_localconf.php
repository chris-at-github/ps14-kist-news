<?php

defined('TYPO3_MODE') or die();

call_user_func(function()	{
	$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['classes']['Domain/Model/News']['news_extended'] = 'news_extended';
});