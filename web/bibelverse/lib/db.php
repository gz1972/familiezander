<?php

include_once("dbmysql.php");
include_once("datetime.php");
include_once("guid.php");

/*
 * The interface to database,
 * all sql statements are encapsulated here within functions of type
 * get, insert, update, delete or validate
 */

/*
 * Returns all user of the given user, or NULL if user not found
 */
function dbGetUserByUserEmail($useremail) {
    
    //mylog(__FILE__, __LINE__, "dbGetUserByUserName(\"$username\")".CRLF);
    
    if($useremail == INVALID_STRING) {
        // no username given
        return NULL;
    }
    
    $db = new CDbMysql();
    if($db->connect() != RETURN_OK) {
        // no DB connection
        return NULL;
    }
    
    $sql_query = "select * from user where Email='$useremail'";
    $res = $db->queryResult($sql_query);
    $db->disconnect();
    if($res == RETURN_OK or $res == RETURN_NOTOK) {
        // given username not found
        return NULL;
    }
    return $res[0];
}

/*
 * Returns all user-data of the given user, or NULL if user not found
 */
function dbGetUserByUserID($userid) {
    
    //mylog(__FILE__, __LINE__, "dbGetUserByUserID($userid)".CRLF);
    
    if($userid == INVALID_ID) {
        // no username given
        return false;
    }
    
    $db = new CDbMysql();
    if($db->connect() != RETURN_OK) {
        // no DB connection
        return false;
    }
    
    $sql_query = "select * from user where UserId=$userid";
    $res = $db->queryResult($sql_query);
    $db->disconnect();
    if($res == RETURN_OK or $res == RETURN_NOTOK) {
        // given username not found
        return NULL;
    }
    return $res[0];
}

/*
 * Returns all user-data of the given user, or NULL if user not found
 */
function dbGetUserByUserTokenText($userTokenText) {
    
    //mylog(__FILE__, __LINE__, "dbGetUserByUserID($userid)".CRLF);
    
    if(empty($userTokenText)) {
        // no username given
        return NULL;
    }
    
    $db = new CDbMysql();
    if($db->connect() != RETURN_OK) {
        // no DB connection
        return NULL;
    }
    
    $sql_query = "select * from user where UserTokenText='$userTokenText'";
    $res = $db->queryResult($sql_query);
    $db->disconnect();
    if($res == RETURN_OK or $res == RETURN_NOTOK) {
        // given username not found
        return NULL;
    }
    return $res[0];
}

/*
 * Create a new user in database
 */
function dbGetOrRegisterUser($useremail, &$errtext, &$userId) {
    
    //mylog(__FILE__, __LINE__, "uiRegisterUser(\"$useremail\", \"$password\")".CRLF);
    
    if($useremail == INVALID_STRING) {
        // no username or password given
        $errtext = "Benutzername fehlt ";
        return false;
    }
    
    $user = dbGetUserByUserEmail($useremail);
    if($user != NULL) {
        // user already exists
        $errtext = "vorhanden";
        return $user;
    }
    
    $db = new CDbMysql();
    if($db->connect() != RETURN_OK) {
        // no DB connection
        $errtext = "Keine Datenbankverbindung ";
        return false;
    }
    
    $now = getStrTimestamp(getdate());
    $guidText = getGuidText();
    $sql_query = "insert into user (Email, LastLogin, LastPwChange, LoginErrCount, Registered, UserToken) values ('$useremail', '$now', '$now', '0', '$now', (UNHEX(REPLACE('$guidText', '-',''))))";
    $res = $db->queryResult($sql_query);
    if($res != 1) {
        // update failed
        $db->disconnect();
        $errtext = "Datenbank-Fehler beim Speichern des Benutzers.";
        return false;
    }
    
    $sql_query = "select * from user where Email='$useremail'";
    $res = $db->queryResult($sql_query);
    if($res == RETURN_OK or $res == RETURN_NOTOK) {
        // given username not found
        $db->disconnect();
        $errtext = "Datenbank-Fehler beim Laden ";
        return NULL;
    }
    $userId = $res[0]["UserId"];
    
    $db->disconnect();
    $errtext = "neu";
    return $res[0];
}

function dbInsertVerse($userId, $verse) {
    // TODO

	$paramNames = "BibleId,Book,BookId,BookShort,Chapter,ChapterId,Location,LocationShort,Text,Timestamp,UserId,Verse,VerseId";
	$paramValues = "todo"; //"'" . $solaRegDate . "','" . $solaFormData["SolaId"] . "','" . $solaFormData["UserId"] . "'";

    $sql_query = "insert into bibleverse ($paramNames) values ($paramValues)";
}

function dbGetVerse($userId, $bId) {

    if($userId == INVALID_ID) {
        // no username given
        return false;
    }
    
    $db = new CDbMysql();
    if($db->connect() != RETURN_OK) {
        // no DB connection
        return false;
    }
    
    $sql_query = "select * from bibleverse where UserId=$userId BibleId=$bId";
    $res = $db->queryResult($sql_query);
    $db->disconnect();
    if($res == RETURN_OK or $res == RETURN_NOTOK) {
        // given username not found
        return [];
    }
    return $res;
}

?>
