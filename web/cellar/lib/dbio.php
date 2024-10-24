<?php

include_once("dbmysql.php");
//include_once("parameter.php");
//include_once("functions.php");

function checkDbOk() {
	$db = new CDbMysql();
	if($db->connect() != RETURN_OK) {
		// no DB connection
		return false;
	}
	$db->setQuery("select count(*) as count from cellarpump");
	$res = $db->executeQuery();
	if(count($res) == 0) {
		$db->disconnect();
		return false;
	}
	
	$db->disconnect();
	return $res[0]["count"] > 0;
}

function getLastStates($num) {
	$db = new CDbMysql();
	if($db->connect() != RETURN_OK) {
		// no DB connection
		return NULL;
	}
	$db->setQuery("select Status, Timestamp from ( select Status, Timestamp from cellarpump order by Timestamp desc limit $num ) as sub order by Timestamp asc;");
	$res = $db->executeQuery();
	if(count($res) == 0) {
		$db->disconnect();
		return NULL;
	}
	
	$db->disconnect();
	return $res;
}

function importState($state, $timestamp) {
	$db = new CDbMysql();
	if($db->connect() != RETURN_OK) {
		$errtext = "Verbindung zur Datenbank fehlgeschlagen";
		return NULL;
	}
	
	$sqlQuery = "insert into cellarpump (Status, Timestamp) values (?,?)";
	$db->setQuery($sqlQuery);
	$db->setParameter($state);
	$db->setParameter($timestamp);
	try {
		$res = $db->executeQuery();
	} catch (Exception $e) {
		echo "Uuups, leider ist ein Fehler aufgetreten und die Daten konnten nicht gespeichert werden - sorry. :-(";
	}
	if($res != 1) {
		$db->disconnect();
		$errtext = "Datenbank-Fehler beim Speichern der Daten.";
		echo "Datenbank-Fehler beim Speichern der Daten.<br/>";
		return NULL;
	}
	
	$db->emptyParameter();
	$db->disconnect();
	return $res;
}

?>
