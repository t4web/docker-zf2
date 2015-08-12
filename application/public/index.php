<?php
// just for testing PHP and MySQL connection 

echo "Create PDO connection..";

$pdo = new \PDO(
    'mysql:host=db;dbname=zf2',
    'root',
    'root'
);

echo "Create table..";

var_dump($pdo->exec("
	CREATE TABLE IF NOT EXISTS `auth` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `uname` varchar(50) NOT NULL,
	  `password` varchar(255) NOT NULL,
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `uname` (`uname`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;
"));

echo "Insert data..";

var_dump($pdo->exec("
	INSERT INTO `auth` (`id`, `uname`, `password`) VALUES
	(1, 'user@some.domain', 'd07c0a0632a8ed6f4c144824bc1211621defbff2'),
	(2, 'user2@some.domain', '2a15833ecb8c2ddd0146e2afa80ef2e7ac3f278d')
"));

echo "Select data..";

$rows = $pdo->query("SELECT * FROM `auth`", \PDO::FETCH_ASSOC);
foreach ($rows as $row) {
        print $row['id'] . "\t";
        print $row['uname'] . "\t";
        print $row['password'] . "\n";
    }

die(var_dump($rows));

