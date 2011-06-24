--  ====================================== 
--        IP Blacklist for blocking IP's
--  ======================================
CREATE TABLE `IpBlacklist` (
  `IpBlacklistId` smallint unsigned NOT NULL auto_increment,
  `Ip` varchar(255) NOT NULL,
  `Expires` Date NOT NULL,
  PRIMARY KEY  (`IpBlacklistId`)
) ENGINE=InnoDB CHARSET=utf8;

--  ====================================== 
--        Templates & General Variables
--  ======================================
CREATE TABLE `EmailTemplate` (
  `TemplateId` smallint unsigned NOT NULL auto_increment,
  `Enabled` tinyint(1) default NULL,
  `Name` varchar(255) NOT NULL,
  `SubjectTemplate` varchar(512) NOT NULL,
  `HtmlTemplate` text,
  `TextTemplate` text,
  PRIMARY KEY  (`TemplateId`)
) ENGINE=InnoDB CHARSET=utf8;

CREATE TABLE `TemplateFile` (
  `TemplateFileId` smallint unsigned NOT NULL auto_increment,
  `Enabled` tinyint(1) default NULL,
  `Name` varchar(255) NOT NULL,
  `Filename` varchar(255),
  `TemplateId` smallint unsigned NOT NULL,
  PRIMARY KEY  (`TemplateFileId`)
) ENGINE=InnoDB CHARSET=utf8;
ALTER TABLE `TemplateFile` ADD CONSTRAINT FOREIGN KEY (`TemplateId`) REFERENCES `EmailTemplate` (`TemplateId`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE `TemplateFileAttachment` (
  `TemplateFileAttachmentId` smallint unsigned NOT NULL auto_increment,
  `Enabled` tinyint(1) default NULL,
  `Name` varchar(255) NOT NULL,
  `Filename` varchar(255),
  `TemplateId` smallint unsigned NOT NULL,
  PRIMARY KEY  (`TemplateFileAttachmentId`)
) ENGINE=InnoDB CHARSET=utf8;
ALTER TABLE `TemplateFileAttachment` ADD CONSTRAINT FOREIGN KEY (`TemplateId`) REFERENCES `EmailTemplate` (`TemplateId`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE `Variable` (
  `VariableId` smallint unsigned NOT NULL auto_increment,
  `Enabled` tinyint(1) default NULL,
  `Name` varchar(32) NOT NULL,
  `Value` varchar(256) NOT NULL,
  `TemplateId` smallint unsigned,
  PRIMARY KEY  (`VariableId`)
) ENGINE=InnoDB CHARSET=utf8;
ALTER TABLE `Variable` ADD CONSTRAINT FOREIGN KEY (`TemplateId`) REFERENCES `EmailTemplate` (`TemplateId`) ON DELETE CASCADE ON UPDATE CASCADE;

--  ====================================== 
--  Generic user table.
--  ======================================
CREATE TABLE  `User` (
  `UserId` mediumint unsigned NOT NULL auto_increment,
  `Enabled` tinyint(1) NOT NULL,
  `Firstname` varchar(255),
  `Lastname` varchar(255),
  `UserLevel` enum('User','Admin') default 'User',
  `Email` varchar(255),	
  `Username` varchar(32) UNIQUE,
  `Password` varchar(255) NOT NULL,
  `CreationTime` TIMESTAMP,
  `IP` varchar(50),
  `Browser` varchar(255),
  PRIMARY KEY  (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 

--  ====================================== 
--  Default User 
--   - username test
--   - password test
--  ======================================
INSERT into `User`(Enabled, Firstname, Lastname, UserLevel, Username, Password) values(1, 'Ryan', 'Henderson', 'Admin', 'test', '098f6bcd4621d373cade4e832627b4f6');

--  ====================================== 
--  Table for the Job manager
--  ======================================

CREATE TABLE `Job` (
  `JobId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `JobName` varchar(255) NOT NULL,
  `CreationTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `LastExecution` datetime NOT NULL DEFAULT '1999-01-01 00:00:00',
  `Timeout` mediumint(8) unsigned NOT NULL,
  `Delay` mediumint(8) unsigned NOT NULL,
  `Email` varchar(255),
  `Url` varchar(255) NOT NULL,
  PRIMARY KEY (`JobId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `JobHistory` (
  `JobHistoryId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `CreationTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `JobInfo` varchar(255) NOT NULL,
  `StartTime` datetime NOT NULL,
  `FinishTime` datetime NOT NULL,
  `HttpCode` mediumint(8) unsigned NOT NULL,
  `Message` text,
  PRIMARY KEY (`JobHistoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  ====================================== 
--  Default phpcron job
--   - job name
--	 - timeout 
--	 - delay
--	 - email address (can be NULL)
--	 - url
--  ======================================
INSERT INTO `Job` (`JobName`,`Timeout`,`Delay`,`Email`,`Url`)
VALUES ('Default job', 30, 3600, 'email@address.com', 'http://localhost:8888/jobs.php?job=default');
