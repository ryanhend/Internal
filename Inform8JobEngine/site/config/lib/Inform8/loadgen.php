<?php
/**
 * Utility class to load/register all Inform8 library code.
 *
 * Generated source code using Inform8.
 */
require_once 'Inform8Context.php';
require_once 'Inform8Exception.php';
require_once 'dao/Inform8Dao.php';
require_once 'log/Inform8Logger.php';
require_once 'iql/load.php';

$classLookup = Inform8Context::getClassRegistry();


	$classLookup->registerClass('EmailTemplateDao', 'config/lib/Inform8/dao/EmailTemplateDao.php');
	
	$classLookup->registerClass('EmailTemplateData', 'config/lib/Inform8/do/EmailTemplateDataClass.php');
	$classLookup->registerClass('EmailTemplate', 'config/lib/Inform8/bo/EmailTemplateClass.php');
	
	$classLookup->registerClass('EmailTemplateJsonBuilder', 'config/lib/Inform8/json/EmailTemplateJsonBuilder.php');
	$classLookup->registerClass('EmailTemplateXmlBuilder', 'config/lib/Inform8/xml/EmailTemplateXmlBuilder.php');
	
	$classLookup->registerClass('EmailTemplateIQL', 'config/lib/Inform8/iql/EmailTemplateIQL.php');
															 
	$classLookup->registerClass('EmailTemplateCreateTransaction', 'config/lib/Inform8/transact/EmailTemplateCreateTransaction.php');
	$classLookup->registerClass('EmailTemplateUpdateTransaction', 'config/lib/Inform8/transact/EmailTemplateUpdateTransaction.php');


	$classLookup->registerClass('IpBlacklistDao', 'config/lib/Inform8/dao/IpBlacklistDao.php');
	
	$classLookup->registerClass('IpBlacklistData', 'config/lib/Inform8/do/IpBlacklistDataClass.php');
	$classLookup->registerClass('IpBlacklist', 'config/lib/Inform8/bo/IpBlacklistClass.php');
	
	$classLookup->registerClass('IpBlacklistJsonBuilder', 'config/lib/Inform8/json/IpBlacklistJsonBuilder.php');
	$classLookup->registerClass('IpBlacklistXmlBuilder', 'config/lib/Inform8/xml/IpBlacklistXmlBuilder.php');
	
	$classLookup->registerClass('IpBlacklistIQL', 'config/lib/Inform8/iql/IpBlacklistIQL.php');
															 
	$classLookup->registerClass('IpBlacklistCreateTransaction', 'config/lib/Inform8/transact/IpBlacklistCreateTransaction.php');
	$classLookup->registerClass('IpBlacklistUpdateTransaction', 'config/lib/Inform8/transact/IpBlacklistUpdateTransaction.php');


	$classLookup->registerClass('JobDao', 'config/lib/Inform8/dao/JobDao.php');
	
	$classLookup->registerClass('JobData', 'config/lib/Inform8/do/JobDataClass.php');
	$classLookup->registerClass('Job', 'config/lib/Inform8/bo/JobClass.php');
	
	$classLookup->registerClass('JobJsonBuilder', 'config/lib/Inform8/json/JobJsonBuilder.php');
	$classLookup->registerClass('JobXmlBuilder', 'config/lib/Inform8/xml/JobXmlBuilder.php');
	
	$classLookup->registerClass('JobIQL', 'config/lib/Inform8/iql/JobIQL.php');
															 
	$classLookup->registerClass('JobCreateTransaction', 'config/lib/Inform8/transact/JobCreateTransaction.php');
	$classLookup->registerClass('JobUpdateTransaction', 'config/lib/Inform8/transact/JobUpdateTransaction.php');


	$classLookup->registerClass('JobHistoryDao', 'config/lib/Inform8/dao/JobHistoryDao.php');
	
	$classLookup->registerClass('JobHistoryData', 'config/lib/Inform8/do/JobHistoryDataClass.php');
	$classLookup->registerClass('JobHistory', 'config/lib/Inform8/bo/JobHistoryClass.php');
	
	$classLookup->registerClass('JobHistoryJsonBuilder', 'config/lib/Inform8/json/JobHistoryJsonBuilder.php');
	$classLookup->registerClass('JobHistoryXmlBuilder', 'config/lib/Inform8/xml/JobHistoryXmlBuilder.php');
	
	$classLookup->registerClass('JobHistoryIQL', 'config/lib/Inform8/iql/JobHistoryIQL.php');
															 
	$classLookup->registerClass('JobHistoryCreateTransaction', 'config/lib/Inform8/transact/JobHistoryCreateTransaction.php');
	$classLookup->registerClass('JobHistoryUpdateTransaction', 'config/lib/Inform8/transact/JobHistoryUpdateTransaction.php');


	$classLookup->registerClass('TemplateFileDao', 'config/lib/Inform8/dao/TemplateFileDao.php');
	
	$classLookup->registerClass('TemplateFileData', 'config/lib/Inform8/do/TemplateFileDataClass.php');
	$classLookup->registerClass('TemplateFile', 'config/lib/Inform8/bo/TemplateFileClass.php');
	
	$classLookup->registerClass('TemplateFileJsonBuilder', 'config/lib/Inform8/json/TemplateFileJsonBuilder.php');
	$classLookup->registerClass('TemplateFileXmlBuilder', 'config/lib/Inform8/xml/TemplateFileXmlBuilder.php');
	
	$classLookup->registerClass('TemplateFileIQL', 'config/lib/Inform8/iql/TemplateFileIQL.php');
															 
	$classLookup->registerClass('TemplateFileCreateTransaction', 'config/lib/Inform8/transact/TemplateFileCreateTransaction.php');
	$classLookup->registerClass('TemplateFileUpdateTransaction', 'config/lib/Inform8/transact/TemplateFileUpdateTransaction.php');


	$classLookup->registerClass('TemplateFileAttachmentDao', 'config/lib/Inform8/dao/TemplateFileAttachmentDao.php');
	
	$classLookup->registerClass('TemplateFileAttachmentData', 'config/lib/Inform8/do/TemplateFileAttachmentDataClass.php');
	$classLookup->registerClass('TemplateFileAttachment', 'config/lib/Inform8/bo/TemplateFileAttachmentClass.php');
	
	$classLookup->registerClass('TemplateFileAttachmentJsonBuilder', 'config/lib/Inform8/json/TemplateFileAttachmentJsonBuilder.php');
	$classLookup->registerClass('TemplateFileAttachmentXmlBuilder', 'config/lib/Inform8/xml/TemplateFileAttachmentXmlBuilder.php');
	
	$classLookup->registerClass('TemplateFileAttachmentIQL', 'config/lib/Inform8/iql/TemplateFileAttachmentIQL.php');
															 
	$classLookup->registerClass('TemplateFileAttachmentCreateTransaction', 'config/lib/Inform8/transact/TemplateFileAttachmentCreateTransaction.php');
	$classLookup->registerClass('TemplateFileAttachmentUpdateTransaction', 'config/lib/Inform8/transact/TemplateFileAttachmentUpdateTransaction.php');


	$classLookup->registerClass('UserDao', 'config/lib/Inform8/dao/UserDao.php');
	
	$classLookup->registerClass('UserData', 'config/lib/Inform8/do/UserDataClass.php');
	$classLookup->registerClass('User', 'config/lib/Inform8/bo/UserClass.php');
	
	$classLookup->registerClass('UserJsonBuilder', 'config/lib/Inform8/json/UserJsonBuilder.php');
	$classLookup->registerClass('UserXmlBuilder', 'config/lib/Inform8/xml/UserXmlBuilder.php');
	
	$classLookup->registerClass('UserIQL', 'config/lib/Inform8/iql/UserIQL.php');
															 
	$classLookup->registerClass('UserCreateTransaction', 'config/lib/Inform8/transact/UserCreateTransaction.php');
	$classLookup->registerClass('UserUpdateTransaction', 'config/lib/Inform8/transact/UserUpdateTransaction.php');


	$classLookup->registerClass('VariableDao', 'config/lib/Inform8/dao/VariableDao.php');
	
	$classLookup->registerClass('VariableData', 'config/lib/Inform8/do/VariableDataClass.php');
	$classLookup->registerClass('Variable', 'config/lib/Inform8/bo/VariableClass.php');
	
	$classLookup->registerClass('VariableJsonBuilder', 'config/lib/Inform8/json/VariableJsonBuilder.php');
	$classLookup->registerClass('VariableXmlBuilder', 'config/lib/Inform8/xml/VariableXmlBuilder.php');
	
	$classLookup->registerClass('VariableIQL', 'config/lib/Inform8/iql/VariableIQL.php');
															 
	$classLookup->registerClass('VariableCreateTransaction', 'config/lib/Inform8/transact/VariableCreateTransaction.php');
	$classLookup->registerClass('VariableUpdateTransaction', 'config/lib/Inform8/transact/VariableUpdateTransaction.php');

?>