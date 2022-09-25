<?php

  /*
   * All the database related functionality.
   */

  // the includes
  include_once("constants.php");
  
  
  class CDbMysql {
  
    // the database ressource
    private $db       = NULL;
    private $dbserver = DB_SERVER;
    private $dbname   = DB_NAME;
    private $dbuser   = DB_USER;
    private $dbpass   = DB_PASS;
    private $dbenc    = DB_ENCODING;
    
    public function setDbServer($server) {
      if($server != NULL) {
        $this->dbserver = $server;
      }
    }
    public function setDbName($name) {
      if($name != NULL) {
        $this->dbname = $name;
      }
    }
    public function setDbUser($user) {
      if($user != NULL) {
        $this->dbuser = $user;
      }
    }
    public function setDbPass($pass) {
      if($pass != NULL) {
        $this->dbpass = $pass;
      }
    }
    public function setDbEncoding($enc) {
      if($enc != NULL) {
        $this->dbenc = $enc;
      }
    }
    
    public function getDbServer() {
      return $this->dbserver;
    }
    public function getDbName() {
      return $this->dbname;
    }
    public function getDbUser() {
      return $this->dbuser;
    }
    
    public function connect() {
        // ab PHP 7 gibt es die mysql_connect()-Funktion nicht mehr
        //$this->db = @mysql_connect($this->dbserver, $this->dbuser, $this->dbpass);
    	$this->db = @mysqli_connect($this->dbserver, $this->dbuser, $this->dbpass, $this->dbname);
  		if (!$this->db) {
  			//if (!@mysql_select_db($this->dbname)) {
  			  //mylog(__FILE__, __LINE__, "connect(): Selection of database \"".$this->dbname."\" failed. error-Nr. ".@mysql_errno()." - " .@mysql_error().CRLF);
  			  return RETURN_NOTOK;
  			//}
  		} //else {
  			//mylog(__FILE__, __LINE__, "connect(): Connection to DB-server \"".$this->dbserver."\" failed. error-Nr. ".@mysql_errno()." - " .@mysql_error().CRLF);
            //return RETURN_NOTOK;
  		//}
  		return RETURN_OK;
    }
    
  	public function disconnect() {
  	  if($this->db != NULL) {
    		//if(!mysql_close($this->db)) {
    		if(!mysqli_close($this->db)) {
    			//mylog(__FILE__, __LINE__, "disconnect(): Failed to close connection to DB-server \"".$this->dbserver."\". error-Nr. ".@mysql_errno()." - " .@mysql_error().CRLF);
    		}
    		$this->db = NULL;
      }
  	}
	
    public function __construct($server=DB_SERVER, $dbname=DB_NAME, $user=DB_USER, $pass=DB_PASS) {
      if($server != "") $this->setDbServer($server);
      if($dbname != "") $this->setDbName($dbname);
      if($user   != "") $this->setDbUser($user);
      if($pass   != "") $this->setDbPass($pass);
      //$this->log    =& new CLogger();
      //$this->logsql =& new CLogger(LOGFILEPATH."\\".SQLFILENAME);
      //$this->connect();
    }
    
    public function __destruct() {
      $this->disconnect();
    }
    
    public function sendQuery($query, $blog) {
        if($this->dbenc == "utf8") {
            //mysql_query("set names 'utf8'");
        	mysqli_query($this->db, "set names 'utf8'");
        }
    	//$result = mysql_query($query, $this->db);
    	$result = mysqli_query($this->db, $query);
    	if($result !== FALSE and $blog) {
    		//mylog(__FILE__, __LINE__, "sendQuery(\"$query\", $blog)".CRLF);
    	}
    	return $result;
    }
    
    protected function getQueryType($query) {
      $query_start = strtolower(substr(ltrim($query), 0, 4));
      switch($query_start) {
      case "sele": return QT_SELECT;
      case "desc": return QT_DESC;
      case "show": return QT_SHOW;
      case "inse": return QT_INSERT;
      case "dele": return QT_DELETE;
      case "upda": return QT_UPDATE;
      case "repl": return QT_REPLACE;
      }
      return QT_UNKNOWN;
    }
    
    public function getQueryResult($query_type, $result) {
    	if($query_type == QT_SELECT) {
    		//$num_rows = mysql_num_rows($result);
    		$num_rows = mysqli_num_rows($result);
    	} else {
    		//$num_rows = mysql_affected_rows();
    		$num_rows = mysqli_affected_rows($this->db);
    	}
    	//mylog(__FILE__, __LINE__, "getQueryResult($query_type, $result): \$num_rows = \"" . $num_rows . "\"".CRLF);
    	if($num_rows == 0) {
    		//mylog(__FILE__, __LINE__, "getQueryResult($query_type, $result): \"$query\": No data found/changed => return ".RETURN_OK.CRLF);
    		return RETURN_OK;
    	}
    	if($query_type == QT_SELECT || $query_type == QT_DESC || $query_type == QT_SHOW) {
    		$resarray = array();
    		//while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    			$dummy = array_push($resarray,$row);
    		}
    		//mysql_free_result($result);
    		mysqli_free_result($result);
    		//mylog(__FILE__, __LINE__, "getQueryResult($query_type, $result): return \$resarray".CRLF);
    		return $resarray;
    	} else {
    		//mylog(__FILE__, __LINE__, "getQueryResult($query_type, $result): return $num_rows".CRLF);
    		return $num_rows;
    	}
    }
    
    public function queryResult($query) {
    	//mylog(__FILE__, __LINE__, "queryResult(\"$query\")".CRLF);
    	$query_type = $this->getQueryType($query);
    	$result = $this->sendQuery($query, ($query_type>=QT_INSERT));
    	$num_rows = 0;
    	if($result === FALSE) {
    		//mylog(__FILE__, __LINE__, "queryResult(): Error processing \"$query\": " . mysql_error() . CRLF);
    		return RETURN_NOTOK;
    	}
    	return $this->getQueryResult($query_type, $result);
    }
  }

?>
