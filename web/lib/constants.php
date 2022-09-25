<?php

  /*
   * All global constants are defined here.
   */

  // constants for text output (html)
  define("TAB", "    ");
  define("CRLF", "\n");

  // database related stuff
   define("DB_SERVER", "localhost");
//  define("DB_SERVER", "10.35.47.28:3306");
  define("DB_NAME", "k181726_familiezander");
  define("DB_USER", "k181726_gunther");
  define("DB_PASS", "Et5tq05?8vSet!28_V1wgt76");
  define("DB_ENCODING", "utf8"); // utf8 oder latin1

  // The error messages
  define("ERR_NODBCONN", "Error: connection to database failed.");

  // query types select, desc, insert, delete, update, replace, show
  define("QT_UNKNOWN",  0);
  define("QT_SELECT",   1);
  define("QT_DESC",     2);
  define("QT_SHOW",     3);
  define("QT_INSERT",  10);
  define("QT_DELETE",  11);
  define("QT_UPDATE",  12);
  define("QT_REPLACE", 13);

  // The return values
  define("RETURN_OK", 0);
  define("RETURN_NOTOK", -1);

  // special (invalid)) values
  define("INVALID_INDEX", -1);
  define("INVALID_ORDERNR", -1);
  define("INVALID_ID", 0);
  define("INVALID_STRING", "");


?>