
<?php 

include("../connect.php");

@mysql_select_db(parking) or die( "Unable to select database");
$query="CREATE TABLE `students` (
  `id` int(6) NOT NULL auto_increment,
  `first` varchar(15) NOT NULL,
  `last` varchar(15) NOT NULL,
  `grade` int(2) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `choice` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `spot` int(11) default NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1

CREATE TABLE `settings` (
  `id` int(11) default NULL,
  `is_open` varchar(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1

";
mysql_query($query);
mysql_close();
?>