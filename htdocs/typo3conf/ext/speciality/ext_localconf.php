<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

# Include static TypoScript files from extensions using a hook.
# @see http://blog.causal.ch/2012/05/automatically-including-static-ts-from.html
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tstemplate.php']['includeStaticTypoScriptSources'][] =
	'EXT:' . $_EXTKEY . '/Classes/Hooks/TypoScriptTemplate.php:TYPO3\CMS\Speciality\Hooks\TypoScriptTemplate->preprocessIncludeStaticTypoScriptSources';


\TYPO3\CMS\Speciality\Hooks\TypoScriptTemplate::getInstance()->addStaticTemplates(array(
	'EXT:css_styled_content/static',
	'EXT:speciality/Configuration/TypoScript',
	'EXT:fluidcontent/Configuration/TypoScript',
	'EXT:fluidcontent_bootstrap/Configuration/TypoScript',
	'EXT:seo_basics/static',
));

# Development configuration (override default configuration)
$developmentConfigurationFile = sprintf('%s/Configuration/%s/DefaultConfiguration.php',
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY),
	\TYPO3\CMS\Speciality\Utility\Context::getInstance()->getName()
);

if (file_exists($developmentConfigurationFile)) {
	include_once($developmentConfigurationFile);
}
?>
