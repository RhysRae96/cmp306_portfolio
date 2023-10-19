<?php

	function jsonRpcFormatCheck($request) {
	//  function to check that the JSON-RPC parameters are there and correct
		$jsonrpc = $request -> jsonrpc ;
		$method = $request -> method ;
		$id = $request -> id ;
		if ( ($jsonrpc != "2.0" ) or ($method == NULL) or ($id == NULL)) {
			$return = 0 ;
		}
		else {
			$return = 1 ;
		}
		return $return ;
	} ;
	
	function checkMethodParams($method, $params) {
		switch ($method) {
			case "getAllUsers":
        		if ($params != null) {
        			$return -32602;
        		}
        		else {
        			$return = 1 ;
        		}
      			break;
    		case "getUserById":
        		if ($params -> id != null) {
        			$return -32602;
        		}
        		else {
        			$return = 1 ;
        		}
      			break;
    		case "createUser":
        		if ($params -> txt != null) {
        			$return -32602;
        		}
        		else {
        			$return = 1 ;
        		}
      			break;
    		case "deleteUserById":
    			if ($params -> id != null) {
        			$return -32602;
        		}
        		else {
        			$return = 1 ;
        		}
      			break;
    		case "updateUser":
    			if ($params-> txt != null) {
        			$return -32602;
        		}
        		else {
        			$return = 1 ;
        		}
      			break;
			default :
    		// method not found
        		$return = -32601;
        	break ;
        }
        return $return ;
} 
	
?>