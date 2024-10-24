<?php

  /*
   * All the database related functionality.
   * Code change in 2022/2023 - now with prepared statements
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
    private $dbport   = DB_PORT;
    private $dbsocket = DB_SOCKET;
    private $dbenc    = DB_ENCODING;

    private $query = "";
    private $values = [];
    
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
        $this->db = @mysqli_connect($this->dbserver, $this->dbuser, $this->dbpass, $this->dbname, $this->dbport, $this->dbsocket);
        if (!$this->db) {
            return RETURN_NOTOK;
        }
        return RETURN_OK;
    }
    
  	public function disconnect() {
  	  if($this->db != NULL) {
    		if(!mysqli_close($this->db)) {
    		}
    		$this->db = NULL;
      }
  	}
	
    public function __construct($server=DB_SERVER, $dbname=DB_NAME, $user=DB_USER, $pass=DB_PASS) {
      if($server != "") $this->setDbServer($server);
      if($dbname != "") $this->setDbName($dbname);
      if($user   != "") $this->setDbUser($user);
      if($pass   != "") $this->setDbPass($pass);
    }
    
    public function __destruct() {
      $this->disconnect();
    }

    public function setQuery($query) {
        $this->query = $query;
    }

    public function setParameter($value) {
        $this->values[] = $value;
    }
    
    public function setParameters($values) {
      if (!is_array($values)) {
          throw new Exception();
      }
        $this->values = $values;
    }
    
    public function emptyParameter() {
        $this->values = [];
    }

    public function executeQuery() {
      // Anzahl der ?-Platzhalter mit der Anzahl der Parameter vergleichen
      if (substr_count($this->query, "?") != count($this->values)) {
          throw new Exception("SQL-Error: Die Anzahl der ?-Platzhalter in der Query (" . substr_count($this->query, "?") . ") stimmt nicht mit der Anzahl der Parameter (" . count($this->values) . ") überein.", E_USER_ERROR);
      }
      
      $query_type = $this->getQueryType();
      if($query_type == QT_UNKNOWN) {
          throw new Exception('SQL-Error: Du hast versucht executeQuery mit einem nicht unterstuetztem query aufzurufen, QT_UKNOWN nicht unterstuetzt.', E_USER_ERROR);
      }
      
      if($this->dbenc == "utf8") {
          mysqli_query($this->db, "set names 'utf8'");
      }
      
      /* Prepare statement */
      $stmt = $this->db->prepare($this->query);
      if($stmt === false) {
          // TODO: nach erfolgreichem Test auskommentieren
          throw new Exception('SQL-Error: ' . $this->db->errno . ' ' . $this->db->error, E_USER_ERROR);
      }

      if (count($this->values) > 0) {
          /* build $a_params */
          $a_params = array();
          $types = $this->getTypeLetters();
          $this->buildParameterArray($a_params, $types);
    
          /* use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array */
          call_user_func_array(array($stmt, 'bind_param'), $a_params);
      }
      
      /* Execute statement */
      $stmt->execute();
      
      /* initialize $result, declare in if/else statement */
      $result = null;
      /* alles ab QT_INSERT (10) erwartet nur affected rows als Ausgabe (Zahl), statt Array */
      if($query_type>=QT_INSERT){
          $result = $stmt->affected_rows;
      } else {
          /* Fetch result to array */
          $result = array();
          $tmp_result = $stmt->get_result();
          while($row = $tmp_result->fetch_array(MYSQLI_ASSOC)) {
              array_push($result, $row);
          }
      }
      $stmt->close();
      return $result;
    }
    
    protected function getQueryType() {
      $query_start = strtolower(substr(ltrim($this->query), 0, 4));
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

    protected function getTypeLetters() {
      $types = '';
      foreach($this->values as $value) {
        if(is_int($value)) {
            // Integer
            $types .= 'i';
        } elseif (is_float($value)) {
            // Double
            $types .= 'd';
        } elseif (is_string($value)) {
            // String
            $types .= 's';
        } else {
            // Blob and Unknown
            $types .= 'b';
        }
      }
      return $types;
    }
  
    /**
     * array params must be passed by reference for call_user_func_array
     */
    protected function buildParameterArray(&$a_params, &$types){
        $n = strlen($types);
        /* with call_user_func_array, array params must be passed by reference */
        $a_params[] = & $types;
        
        for($i = 0; $i < $n; $i++) {
            /* with call_user_func_array, array params must be passed by reference */
            $a_params[] = & $this->values[$i];
        }
    }      
}
?>
