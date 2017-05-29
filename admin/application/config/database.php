<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['dsn']      The full DSN string describe a connection to the database.
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database driver. e.g.: mysqli.
|			Currently supported:
|				 cubrid, ibase, mssql, mysql, mysqli, oci8,
|				 odbc, pdo, postgre, sqlite, sqlite3, sqlsrv
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Query Builder class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['encrypt']  Whether or not to use an encrypted connection.
|
|			'mysql' (deprecated), 'sqlsrv' and 'pdo/sqlsrv' drivers accept TRUE/FALSE
|			'mysqli' and 'pdo/mysql' drivers accept an array with the following options:
|
|				'ssl_key'    - Path to the private key file
|				'ssl_cert'   - Path to the public key certificate file
|				'ssl_ca'     - Path to the certificate authority file
|				'ssl_capath' - Path to a directory containing trusted CA certificats in PEM format
|				'ssl_cipher' - List of *allowed* ciphers to be used for the encryption, separated by colons (':')
|				'ssl_verify' - TRUE/FALSE; Whether verify the server certificate or not ('mysqli' only)
|
|	['compress'] Whether or not to use client compression (MySQL only)
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|	['ssl_options']	Used to set various SSL options that can be used when making SSL connections.
|	['failover'] array - A array with 0 or more data for connections if the main should fail.
|	['save_queries'] TRUE/FALSE - Whether to "save" all executed queries.
| 				NOTE: Disabling this will also effectively disable both
| 				$this->db->last_query() and profiling of DB queries.
| 				When you run a query, with this setting set to TRUE (default),
| 				CodeIgniter will store the SQL statement for debugging purposes.
| 				However, this may cause high memory usage, especially if you run
| 				a lot of SQL queries ... disable this to avoid that problem.
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $query_builder variables lets you determine whether or not to load
| the query builder class.
*/
$active_group = 'default';
$active_record = TRUE;
if($_SERVER['HTTP_HOST']=='localhost'){
   $active_group = 'default2';
}
else if($_SERVER['HTTP_HOST']=='127.0.0.1' || $_SERVER['HTTP_HOST']=='192.168.1.19'){
   $active_group = 'default2';
}
else if($_SERVER['HTTP_HOST']=='dev.dipanjan.com' ){
   $active_group = 'default2';
}
else if($_SERVER['HTTP_HOST']=='www.blogmo.co'){
    $active_group = 'live';
}
else if($_SERVER['HTTP_HOST']=='itrackedltd.com'){
    $active_group = 'live';
}
else{
    $active_group = 'live';
}
//192.168.2.48
//echo $active_group; die();
//echo "hi"; die;
$db['default2']['hostname'] = '192.168.1.109';
$db['default2']['username'] = 'testuser';
$db['default2']['password'] = 'grass1=!';
$db['default2']['database'] = 'itritrac_itracked1';
$db['default2']['dbdriver'] = 'mysql';
$db['default2']['dbprefix'] = 'tbl_';
$db['default2']['pconnect'] = TRUE;
$db['default2']['db_debug'] = TRUE;
$db['default2']['cache_on'] = FALSE;
$db['default2']['cachedir'] = '';
$db['default2']['char_set'] = 'utf8';
$db['default2']['dbcollat'] = 'utf8_general_ci';
$db['default2']['swap_pre'] = '#__';
$db['default2']['autoinit'] = TRUE;
$db['default2']['stricton'] = FALSE;

$db['local']['hostname'] = '192.168.1.109';
$db['local']['username'] = 'testuser';
$db['local']['password'] = 'grass1=!';
$db['local']['database'] = 'itritrac_itracked1';
$db['local']['dbdriver'] = 'mysql';
$db['local']['dbprefix'] = 'tbl_';
$db['local']['pconnect'] = TRUE;
$db['local']['db_debug'] = TRUE;
$db['local']['cache_on'] = FALSE;
$db['local']['cachedir'] = '';
$db['local']['char_set'] = 'utf8';
$db['local']['dbcollat'] = 'utf8_general_ci';
$db['local']['swap_pre'] = '#__';
$db['local']['autoinit'] = TRUE;
$db['local']['stricton'] = FALSE;


//$db['live']['hostname'] = 'localhost';
//$db['live']['username'] = 'blogmoco_itrack';
//$db['live']['password'] = '@Qmi1nPE4eH{';
//$db['live']['database'] = 'blogmoco_itracked';
//$db['live']['dbdriver'] = 'mysql';
//$db['live']['dbprefix'] = 'tbl_';
//$db['live']['pconnect'] = TRUE;
//$db['live']['db_debug'] = TRUE;
//$db['live']['cache_on'] = FALSE;
//$db['live']['cachedir'] = '';
//$db['live']['char_set'] = 'utf8';
//$db['live']['dbcollat'] = 'utf8_general_ci';
//$db['live']['swap_pre'] = '#__';
//$db['live']['autoinit'] = TRUE;
//$db['live']['stricton'] = FALSE;

$db['live']['hostname'] = 'localhost';
$db['live']['username'] = 'itritrac_ituser';
$db['live']['password'] = 'R~@q+VS,F*zu';
$db['live']['database'] = 'itritrac_itracked1';
$db['live']['dbdriver'] = 'mysqli';
$db['live']['dbprefix'] = 'tbl_';
$db['live']['pconnect'] = TRUE;
$db['live']['db_debug'] = TRUE;
$db['live']['cache_on'] = FALSE;
$db['live']['cachedir'] = '';
$db['live']['char_set'] = 'utf8';
$db['live']['dbcollat'] = 'utf8_general_ci';
$db['live']['swap_pre'] = '#__';
$db['live']['autoinit'] = TRUE;
$db['live']['stricton'] = FALSE;
