<?php 
class sqlhandler {

	/** var array */
	var $table_fields;
	/** var string */
	var $stmt;
	/** var array */
	var $result;
	/** var integer */
	var $last_insert_id;
	/** var string */
	var $error;
	/** var object */
	var $handler;
	/** var interger */
	var $page;
	/** var interger */
	var $max_results;
	/** var boolean */
	var $use_pagination;
	/** var array */
	var $pagination_results;
	/** var array */
	var $pagination_nav;
	/** var array */
	var $pagination;
	/** var interger */
	var $number_of_pages;
	/** var string */
	var $navigation_page;
	/** var interger */
	var $number_of_results;
	var $number_of_links;
	/** var object */
	var $instance;
		/** var int*/
		var $result_type;
		/** tables fields */
		var $tables;
	
	 
	
	function sqlhandler($username,$password,$schema,$server = 'localhost',$new_link=false){
			if(!isset($server) || !is_string($server) || strlen($server) <= 0) {
				$this->error = "Please set the database server.";
				return false;
			}
			else {
				$server = addslashes($server);
			}
			if(!isset($username) || !is_string($username) || strlen($username) <= 0) {
				$this->error = "Please set the database username.";
				return false;
			}
			else {
				$username = addslashes($username);
			}
			if(!isset($password) || !is_string($password) || strlen($password) <= 0) {
				$this->error = "Please set the username password.";
				return false;
			}
			else {
				$password = addslashes($password);
			}
			if(!isset($server) || !is_string($schema) || strlen($schema) <= 0) {
				$this->error = "Please set the database schema.";
				return false;
			}
			else {
				$server = addslashes($server);
			}
			
			$this->table_fields		  = array();
			$this->stmt 			  = "";
			$this->result 			  = array();
			$this->last_insert_id 	  = 0;
			$this->error 			  = '';
					$this->tables = array();
			$this->handler 			  =  mysql_connect($server,$username,$password, $new_link);
			if($this->handler) {
				if(!$this->select_db($schema)) {
					$this->error = 'Unable to select the database. Error: '.mysql_error($this->handler);
					return false;
				}
			}
			else {
				$this->error = 'Unable to connect to the server. Error: '.mysql_error($this->handler);
				return false;
			}
			
			$this->use_pagination	  = true;
			$this->pagination_results = array();
			$this->pagination_nav	  = array();
			$this->pagination		  = array();
			//$this->page          = 0;
					$this->max_results	      = 10;
					$this->number_of_pages	  = 10;
					$this->number_of_links	  = 10;
			$this->number_of_results  = 0;
			$this->navigation_page	  = $_SERVER['PHP_SELF'];
					$this->result_type = 0;
			return true;
	}
	
	
	/**
	* select_db
	* Will swicth or set the database to the given schema using the same connection made for the handler
	* @param string $schema
	* @return variable value
	*/
	function select_db($schema) {
		if(isset($schema) && is_string($schema) && strlen($schema) > 0) {
			$schema = mysql_real_escape_string($schema, $this->handler);
			if(!mysql_select_db($schema, $this->handler)) {
				$this->error = 'Unable to connect to the given database. Please verify the information and try again. Error:'.mysql_error($this->handler);
				return false;
			}
			return true;
		}
	}
	
	/**
	* Method GET
	* Use: $object->variable_name. Ex. $object->pagination;
	* @param string $variable
	* @return variable value
	*/
	function __get($variable) {
		if(isset($this->$variable)) {
			return $this->$variable;
		}
		return false;
	}
	
	/**
	* Select
	* Full method to construct a select query and return paginated results or full results depending on the object configuration
	* @param array $tables => Required. List of all tables for the select. Example: array('table1','table2') or array("table1 'a'","table2 'b'")
	* @param array $fields. List of all fields that will be returned in the query. If none given, then it will use * for the select. In case of using
	* identifiers for the tables, then use them in the fields. Example: array(), array('field1','field2','field3'), array('a.field1','b.field2')
	* @param boolean $isdistinct. It will add the DISTINCT modifier in the query
	* @param array $where. List of all conditions that will be used in the query. Example: array('and field1 = field2', 'and (field1 = 1 or field2 = 2)')
	* @param array $join. List of all join clauses that will be used in the query. For the next arrays use the same logic as used for the fields array.
	* @param array $orderby. List of all order by clauses that will be used in the query
	* @param array $groupby. List of all group by fields that will be used in the query
	*/
	function select($tables, $fields = array(), $isdistinct = false, $where = array(), $join = array(), $orderby = array(), $groupby = array()){
				/*
				There are 2 statments at this method. The first is the class statement ($this->stmt) and it will return the results of the query. The second
				one is the $stmt and it is used to calculate the number of results of the query without being limited for pagination. The second statement
				will only be executed in the case of a pagination.
				*/
				$this->result = false;
				$this->stmt = "SELECT";
						$stmt = "SELECT COUNT(";

				if($isdistinct === true) {
					$this->stmt .= " DISTINCT";
					$stmt .= " DISTINCT";
				}

				if(is_array($fields) && sizeof($fields) > 0) {
					$fieldsSize = sizeof($fields);
					for($k = 0; $k < $fieldsSize; ++$k) {
						if($k > 0) {
							$this->stmt .= ",";
						}
						$this->stmt .= " {$fields[$k]}";
					}
				}
				else {
					$this->stmt .= " *";
				}
				
				$this->stmt .= " FROM";
				$stmt .= "*) FROM";
				
				if(is_array($tables) && sizeof($tables) > 0) {
					$tablesSize = sizeof($tables);
					for($k = 0; $k < $tablesSize; ++$k) {
						if($k > 0) {
							$this->stmt .= ",";
							$stmt .= ",";
						}
						$this->stmt .= " {$tables[$k]}";
						$stmt .= " {$tables[$k]}";
					}
				}
				else {
					$this->error = 'You must pass the tables for this query to be executed.';
					return false;
				}
				
				if(is_array($join) && sizeof($join) > 0){
					foreach($join as $key => $xjoin) {
						if(is_array($xjoin) && sizeof($xjoin) > 0) {
							foreach($xjoin as $aKey => $info) {
								$direction  = $info['dir'];
								if(!in_array(strtoupper($direction),array('LEFT','RIGHT'))){
									$direction = " LEFT";
								}
								$innerOuter = $info['io'];
								if(!in_array(strtoupper($innerOuter),array('INNER','OUTER'))){
									$direction = " OUTER";
								}
								$table		 = $info['table'];
								$clause		 = $info['clause'];
								$this->stmt .= " {$direction} {$innerOuter} JOIN {$table} ON {$clause}";
								$stmt .= " {$direction} {$innerOuter} JOIN {$table} ON {$clause}";
							}
						}
					}
				}
	
				if(is_array($where) && sizeof($where) > 0) {
					$this->stmt .= " WHERE 1 AND (";
					$stmt .= " WHERE 1 AND (";
					foreach($where as $key => $clause) {
						$this->stmt .= " {$clause}";
						$stmt .= " {$clause}";
					}
							$this->stmt .= ')';
							$stmt .= ')';
				}
					
				if(is_array($groupby) && sizeof($groupby) > 0) {
					$groupbysize = sizeof($groupby);
					$this->stmt .= " GROUP BY";
					for($k = 0; $k < $groupbysize; ++$k) {
						if($k > 0) {
							$this->stmt .= ",";
						}
						$this->stmt .= " {$groupby[$k]}";
					}
				}
				
				if(is_array($orderby) && sizeof($orderby) > 0) {
					$orderbysizeof = sizeof($orderby);
					$this->stmt .= " ORDER BY";
					for($k = 0; $k < $orderbysizeof; ++$k) {
						if($k > 0) {
							$this->stmt .= ",";
						}
						$this->stmt .= " {$orderby[$k]}";
					}
				}
	
				//$this->debug($this->page);
				if($this->use_pagination) {
						$this->pagination_nav = array();

						$this->debug("pag: ".$stmt);
						if($stmtCountHandler = mysql_query($stmt, $this->handler)) {
						//echo $stmt;
						$result = mysql_fetch_row($stmtCountHandler); # calculating how many rows total the query have for using on the pagination
						
						$this->number_of_results = (isset($result[0]) && $result[0] > 0) ? $result[0] : 0;
						$this->number_of_pages = ceil($this->number_of_results / $this->max_results);
						$current_page = ($this->page * $this->max_results);
						
						$this->stmt .= " LIMIT {$current_page},{$this->max_results}"; # paginating
						$this->debug("qry ".$this->stmt);
						# The query changed, so bring only results from the pagination
						if($stmtHandler = mysql_query($this->stmt, $this->handler)) {
							switch($this->result_type){
												case 1:
													while($row = mysql_fetch_row($stmtHandler))
														$this->result[] = $row;
													break;
													
												case 2:
													while($row = mysql_fetch_array($stmtHandler))
														$this->result[] = $row;
													break;
													
												default:
//				                  if(!is_resource($stmtHandler))
													while($row = mysql_fetch_assoc($stmtHandler))
														$this->result[] = $row;
													break;
													
										}
						}
						else {
							$this->error = "Unable to execute query. Please verify your statement. ".mysql_error($this->handler);
							return false;
						}
						
						# Building navigation
						if($this->number_of_pages == 1) {
							$this->number_of_pages++;
						}
						if($this->page > 0) {
							$this->pagination_nav['first'] = $this->navigation_page."?&page=0&rpp={$this->max_results}&of={$this->number_of_results}";
							$this->prev_page = $this->page - 1;
							$this->pagination_nav['prev'] = $this->navigation_page."?&page={$this->prev_page}&rpp={$this->max_results}&of={$this->number_of_results}";
						}
						else {
							$this->pagination_nav['first'] = false;
							$this->prev_page = 0;
							$this->pagination_nav['prev'] = false;
						}
						
						$mid = ceil($this->number_of_links / 2 - 1 );
						$start_count = ($this->page - $mid >= 0) ? $this->page - $mid : 0;
						$end_count = ( ($start_count + $this->number_of_links) < $this->number_of_pages ) ? $start_count + $this->number_of_links : $this->number_of_pages-1;
						/*echo $start_count."\n";
						echo $end_count."\n";*/
						//for($k = 0; $k < $this->number_of_pages; ++$k) {
						if($this->number_of_results > $this->max_results)
							for($k = $start_count; $k < $end_count; ++$k) {
								if($k == $this->page) {
									$this->pagination_nav[$k+1] = false;
								}
								else {
								$this->pagination_nav[$k+1] = $this->navigation_page.$addstr."?page={$k}&rpp={$this->max_results}";
								}
							}
							//var_dump($this->pagination_nav);
						//echo $this->number_of_results;
						$this->pagination_nav['total_res'] = $this->number_of_results; 
						if(($this->page +1) < $this->number_of_pages) {
							$this->next_page = $this->page + 1;
							$this->pagination_nav['next'] = $this->navigation_page."?&page={$this->next_page}&rpp={$this->max_results}&of={$this->number_of_results}";
							$this->pagination_nav['last'] = $this->navigation_page."?&page=".($this->number_of_pages - 1 )."&rpp={$this->max_results}&of={$this->number_of_results}";
						}
						else {
							$this->next_page = $this->number_of_pages;
							$this->pagination_nav['next'] = false;
							$this->pagination_nav['last'] = false;
						}
						
						//Set first prev and last next
						$cpag = count($this->pagination_nav);
						return (count($this->result) > 0) ? $this->result : false;
									
					}
					else {
						$this->error = "Unable to execute query. Please verify your statement. ".mysql_error($this->handler);
						return false;
					}
				}
				else {
					$this->debug("qry: ".$this->stmt);
					if($stmtHandler = mysql_query($this->stmt, $this->handler)) {
						switch($this->result_type){
										case 1:
											while($row = mysql_fetch_row($stmtHandler))
												$this->result[] = $row;
										break;
										
										case 2:
											while($row = mysql_fetch_array($stmtHandler))
												$this->result[] = $row;
										break;
										
										default:
											while($row = mysql_fetch_assoc($stmtHandler))
												$this->result[] = $row;
										break;
									}
						return (count($this->result) > 0) ? $this->result : false;
					}
					else {
						$this->error = "Unable to execute query. Please verify your statement. ".mysql_error($this->handler);
						return false;
					}
	
			}
	}
	
	/**
	* Query
	* Full method to execute any type of query. In the case of a select it will return the results. In the case of the insert the last insert id. In the case of
	* update and deletes it will return the number of affected rows and in the case of the any other type, it will return true.
	* @param string $stmt. The query string that needs to be executed.
	* @return boolean, interger or array
	*/
	function query($stmt = ""){
			if(isset($stmt) && is_string($stmt) && strlen($stmt) > 0) {
				$this->stmt = str_replace("\r","",str_replace("\n","",$stmt));
			}
			if(!isset($this->stmt) || !is_string($this->stmt) || strlen($this->stmt) <=0) {
				$this->error = "Please enter a query statement to execute.";
				return false;
			}
			$this->result = false;
			$query_type = strtoupper(trim(substr($this->stmt,0,strpos($this->stmt,' '))));
			$this->debug("qry: ".$this->stmt);
	
			switch($query_type) {
						case 'CALL':
				case 'SELECT':		
						case 'SHOW':
	
					if($stmtHandler = mysql_query($this->stmt, $this->handler)) {
						switch($this->result_type){
										case 1:
											while($row = mysql_fetch_row($stmtHandler)) {
											 $this->result[] = $row;
											}
										break;
										
										case 2:
											while($row = mysql_fetch_array($stmtHandler)) {
											 $this->result[] = $row;
											}
										break;
										
										default:
											while($row = mysql_fetch_assoc($stmtHandler)) {
											 $this->result[] = $row;
											}
										break;
									}
							
						return $this->result;
					}
					else {
						$this->error = "Unable to execute query. Please verify your statement. ".mysql_error($this->handler);
						return false;
					}
					break;
					
					case 'INSERT':
									if($stmtHandler = mysql_query($this->stmt, $this->handler)) {
							$this->last_insert_id = mysql_insert_id($this->handler);
										return $this->last_insert_id;
						}
						else {
							$this->error = "Unable to execute query. Please verify your statement. ".mysql_error($this->handler);
							return false;
						}
					
					break;
					
					case 'UPDATE':
					case 'DELETE':
					default:
								if($stmtHandler = mysql_query($this->stmt, $this->handler)) {
							return true;
						}
						else {
							$this->error = "Unable to execute query. Please verify your statement. ".mysql_error($this->handler);
							return false;
						}
					break;
					
				}
				return false;
	}
	

	/**
	* Insert
	* Full method to construct and execute an given insert
	* @param string $table: Table in which the insert will be made
	* @param array $fields_values as key being the field and the actual values as being the values
	* @return interger
	*/
	function insert($table, $fields_values) {
			if(!isset($table) || !is_string($table) || strlen($table) <= 0) {
				$this->error = "Please enter the table that you want to perform the insert.";
				return false;
			}
			if(!isset($fields_values) || !is_array($fields_values) || sizeof($fields_values) <=0) {
				$this->error = "Please enter the fields and values to perform the insert.";
				return false;
			}
			
				//Check table fields
				if(!isset($this->tables[$table])){
					$sql = "SHOW FIELDS FROM $table";
					$this->tables[$table] = $this->query($sql);
					$tmp_data = array();
					foreach($this->tables[$table] as $key=>$value){
						$field = $value['Field'];
						$type = $value['Type'];
						$tmp_data[$field] = $type;
					}
					$this->tables[$table] = $tmp_data;
				}

			$this->stmt = "INSERT INTO {$table} (";
			$counter = 0;
			
				foreach($fields_values as $field => $value) {
					if($counter > 0) {
						$this->stmt .= ",";
					}
					$this->stmt .= " `{$field}`";
					$counter++;
			}
			$this->stmt .= ") VALUES (";
			$counter = 0;
			foreach($fields_values as $field => $value) {
				if($counter > 0) {
					$this->stmt .= ",";
				} 
					//if(is_numeric($value) && strtolower(substr($value,0,2)) != '0x' && substr($value,0,2) != '00') {
						if(substr(strtolower($this->tables[$table][$field]), 0, 7) === "varchar"
							|| substr(strtolower($this->tables[$table][$field]), 0, 9) === "timestamp"
							|| substr(strtolower($this->tables[$table][$field]), 0, 8) === "tinytext"
							|| substr(strtolower($this->tables[$table][$field]), 0, 4) === "text"
							|| substr(strtolower($this->tables[$table][$field]), 0, 10) === "mediumtext"
							|| substr(strtolower($this->tables[$table][$field]), 0, 8) === "longtext"
							|| substr(strtolower($this->tables[$table][$field]), 0, 4) === "char"
							|| substr(strtolower($this->tables[$table][$field]), 0, 4) === "date"
							|| substr(strtolower($this->tables[$table][$field]), 0, 4) === "time"
							|| substr(strtolower($this->tables[$table][$field]), 0, 4) === "year"
							|| substr(strtolower($this->tables[$table][$field]), 0, 8) === "tinyblob"
							|| substr(strtolower($this->tables[$table][$field]), 0, 4) === "blob"
							|| substr(strtolower($this->tables[$table][$field]), 0, 10) === "mediumblob"
							|| substr(strtolower($this->tables[$table][$field]), 0, 8) === "longblob"
							|| substr(strtolower($this->tables[$table][$field]), 0, 4) === "enum"
							|| substr(strtolower($this->tables[$table][$field]), 0, 3) === "set"
						 ){
							$value = mysql_real_escape_string($value, $this->handler);
							$this->stmt .= " '{$value}'";
				}
				else {
					$this->stmt .= ($value !== null  ) ? " {$value}" : "null";
				}
				$counter++;
			}
			$this->stmt .= ")";
			
					$result = $this->query();
			return $result;
	}


	
	/**
	* Update
	* @param string $table: table where the update will be performed
	* @param array $fields_values: fields with the respective values to be updated. The keys of the array will be the fields. Example: array('field1' => 'value1');
	* @param array $where: where condition to filter down the row(s) where it will be updated
	* @return interger
	*/
	function update($table, $fields_values, $where = array()) {
			if(!isset($table) || !is_string($table) || strlen($table) <= 0) {
				$this->error = "Please enter the table that you want to perform the update.";
				return false;
			}
			if(!isset($fields_values) || !is_array($fields_values) || sizeof($fields_values) <=0) {
				$this->error = "Please enter the fields and values to perform the update.";
				return false;
			}
			
			//Check table fields
			if(!isset($this->tables[$table])){
				//$sql = "SHOW FIELDS FROM $table";
				$this->tables[$table] = $this->getFields($table); //$this->query($sql);
				$tmp_data = array();
				foreach($this->tables[$table] as $key=>$value){
					$field = $value['Field'];
					$type = $value['Type'];
					$tmp_data[$field] = $type;
				}
				$this->tables[$table] = $tmp_data;
			}
			
			$this->stmt = "UPDATE {$table} SET ";
			$counter = 0;
			foreach($fields_values as $field => $value) {
				if($counter > 0) {
					$this->stmt .= ",";
				}
				
				$this->stmt .= " `{$field}` = ";
				
				if(substr(strtolower($this->tables[$table][$field]), 0, 7) === "varchar"
					|| substr(strtolower($this->tables[$table][$field]), 0, 9) === "timestamp"
					|| substr(strtolower($this->tables[$table][$field]), 0, 8) === "tinytext"
					|| substr(strtolower($this->tables[$table][$field]), 0, 4) === "text"
					|| substr(strtolower($this->tables[$table][$field]), 0, 10) === "mediumtext"
					|| substr(strtolower($this->tables[$table][$field]), 0, 8) === "longtext"
					|| substr(strtolower($this->tables[$table][$field]), 0, 4) === "char"
					|| substr(strtolower($this->tables[$table][$field]), 0, 4) === "date"
					|| substr(strtolower($this->tables[$table][$field]), 0, 4) === "time"
					|| substr(strtolower($this->tables[$table][$field]), 0, 4) === "year"
					|| substr(strtolower($this->tables[$table][$field]), 0, 8) === "tinyblob"
					|| substr(strtolower($this->tables[$table][$field]), 0, 4) === "blob"
					|| substr(strtolower($this->tables[$table][$field]), 0, 10) === "mediumblob"
					|| substr(strtolower($this->tables[$table][$field]), 0, 8) === "longblob"
					|| substr(strtolower($this->tables[$table][$field]), 0, 4) === "enum"
					|| substr(strtolower($this->tables[$table][$field]), 0, 3) === "set"
					 ){
				$value = mysql_real_escape_string($value, $this->handler);
							$this->stmt .= " '{$value}'";
				}
				else {
					$this->stmt .= ($value != null  ) ? " {$value}" : "null";
				}
				$counter++;
			}
			if(isset($where) && is_array($where) && sizeof($where) > 0) {
				$this->stmt .= " WHERE 1 AND (";
				foreach($where as $key => $clause) {
					$this->stmt .= " {$clause}";
				}
						$this->stmt .= " )";
			}
			
					$result = $this->query();
			return $result;
	}
	
	
	function delete($table, $where = array()) {
			if(!isset($table) || !is_string($table) || strlen($table) <= 0) {
				$this->error = "Please enter the table that you want to perform the update.";
				return false;
			}
			$this->stmt = "DELETE FROM {$table}";

			if(isset($where) && is_array($where) && sizeof($where) > 0) {
				$this->stmt .= " WHERE 1 AND (";
				foreach($where as $key => $clause) {
					$this->stmt .= " {$clause}";
				}
					$this->stmt .= ')';
			}
			$result = $this->query();
			return $result;
	}  

	function getFields($table){
				$sql = "SHOW FIELDS FROM `$table`";
		$flds = $this->query($sql);
		$ret = array();
		foreach($flds as $f)
			$ret[$f['Field']] = $f;
		return $ret;
	}

	function getHandler(){
		return $this->handler;
	}

	function debug($data){
		return;
		if(! LOG_ ) return;
		//printf("%s\n", $data);
		if(function_exists("date_default_timezone_set") and function_exists("date_default_timezone_get"))
			@date_default_timezone_set(@date_default_timezone_get());
		$f = fopen(_SERVER."logs/mysql_realstate".date("d.m.y", time()).".log", 'a');
		chmod(_SERVER."logs/mysql_realstate".date("d.m.y", time()).".log", 0666);
		if( is_array($data) || is_object($data) )
			fwrite($f,print_r($data, true));
		else
			fwrite($f,$data);
		fwrite($f," on ".$_SERVER['PHP_SELF']."\n\r");
		fclose($f);
		
	}

}
?>