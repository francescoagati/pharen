<?php
require_once('/Applications/MAMP/htdocs/pharen/lang.php');
Lexical::$scopes['sql'] = array();

function sql_connect($user, $pass, $db){

	mysql_connect("localhost", $user, $pass);
	return mysql_select_db($db);
}

function sql_vals($pairs){

	return implode(", ", array_values($pairs));
}

function sql_cols($pairs){

	return implode(", ", array_keys($paris));
}

function sql_fetch_by_id($table, $id){
	$__scope_id = Lexical::init_closure("sql", 47);
	$query = sprintf("SELECT * FROM %s WHERE id=%s;", mysql_real_escape_string($table), mysql_real_escape_string($id));
	Lexical::bind_lexing("sql", 47, '$query', $query);
	return mysql_fetch_assoc(mysql_query($query));
}

function sql_insert($table, $pairs){

	mysql_query(sprintf("INSERT INTO %s (%s) VALUES (%s);", mysql_real_escape_string($table), sql_cols($pairs), sql_vals($pairs)));
	return mysql_insert_id();
}

