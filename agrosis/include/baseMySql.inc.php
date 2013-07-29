<?php
	//General table setup
	include_once ('sqlhandler.inc.php');
	function gen_sid($max_chars) {
		$sid = "";
		for ($count = 1; $count <= $max_chars; $count++) {
			$char = mt_rand(48, 73);
			if ($char > 57) $char += 17;
			$sid .= chr($char);
		}
	return $sid;
	}

	class baseMysql extends sqlhandler{
		
		var $tableName;
		var $pk;
				
		
		function baseMysql($tableName){
			global $DB_HOST , $DB_NAME,$DB_USER,$DB_PASSWORD;  
			
			parent::sqlhandler($DB_USER,$DB_PASSWORD,$DB_NAME,$DB_HOST);
			$this->tableName = $tableName;
			$this->table_fields = $this->getFields($tableName);
		 // $this->setFields();
		}
		
		/*General Get Records
		*Return and array of 3 elements
		* array(results, pagination, query),
		* If an error occur you can call $this->error variable for debug
		*/
		
		 function getRecords($where = '', $order = '' , $pagination = false){
			$this->pagination = $pagination;
			$ret['results'] = array();
			$ret['pagination'] = array();
			$ret['query'] = '';
			if (!is_array($where))
				$where = ($where != '') ? array($where) : array();
			if (!is_array($order))
				$order = ($order != '') ? array($order) : array();
			if($pagination){
				$this->use_pagination = TRUE;
			$this->page = isset($_REQUEST['pag_cp']) ? (int)$_REQUEST['pag_cp'] : 0;
			$this->max_results = isset($_REQUEST['pag_nr']) ? (int)$_REQUEST['pag_nr'] : 10;
			}
			else{
				$this->use_pagination = FALSE;
			}
			//We don't use group by
			$ret['results'] = $this->select(array($this->tableName), array(), false, $where, array(), $order);
			$ret['query'] = $this->stmt;
			if($pagination){
				$ret['pagination'] = $this->pagination_nav;
		$ret['pagination']['page'] = $this->page;
		//var_dump($this);
		//echo $this->total. "<=" .$this->number_of_results."\n";
		//echo $this->max_results.'--'.$this->number_of_results;
		$ret['pagination']['total'] = ($this->max_results >= $this->number_of_results) ? 1 : $this->number_of_pages;
		}
			return $ret;
		}
		
		//Get Only one Record
		 function getRecord($id,$key){
			 $where = " `$key`".'='."'".$id."'";
			 $result = $this->getRecords($where);
			 
			 return (isset($result['results'][0])) ? $result['results'][0] : false;
		}
		
		//Autodetect if update or save a record
		/**
		* saveRecord
		* @param array $values: fields with the respective values to be updated. The keys of the array will be the fields. Example: array('field1' => 'value1');
		* @string array $pk: primary key of the table generally autoincrement use for detect if update existing record if it's in the value and it's = 0
		* @string array $prefix: prefix of the key of the array . Example values[prefix_fieldname] = value
		* @string array $where: where condition to filter down the row(s) where it will be updated
		* @return interger
		*/
		 function saveRecord($values=array(), $pk='',$prefix = '',$where=''){
			//First need to determine if insert one or update
			//if where it's empty look for value of pk if pk=0 update (use extra where too)
			$update = false;
			$new_id = false;
			//First read table fields and if not exit the field remove from array

/*      
			$qry = "SHOW  FIELDS FROM `{$this->tableName}`";
			$tmp_rt = $this->result_type;
			$this->result_type = 2;
			$result = $this->query($qry);
			$this->result_type = $tmp_rt;
			if ($result && count($result) > 0 ){
				foreach($values as $key=>$value){
					$delvalue = $key;
					foreach($result as $field)
						if($field[0] == substr($key,strlen($prefix)))
							$delvalue = false;
					if($delvalue !== false)
						unset($values[$key]);
				}
			}
*/
			$result = $this->getFields($this->tableName);
			if ($result && count($result) > 0 ){
				foreach($values as $key=>$value){
					$delvalue = $key;
					foreach($result as $field=>$f)
						if($field == substr($key,strlen($prefix)))
							$delvalue = false;
					if($delvalue !== false)
						unset($values[$key]);
				}
			}
			
			if(count($values) > 0){    
				if($where == '' && $pk != ''){
					foreach($values as $key=>$value)
						if($key == $prefix.$pk && $value != ''){
							$update = true;
							$where = "`$pk`=$value";
							break;
						}
				}
				elseif ($where != '')
					$update = true; //and dont care what come at $pk
				
				//Prepare values if prefix != ''
				$field_values = array();
				
				foreach($values as $key=>$value){
					if($prefix != ''){
						$field_name = substr($key,strlen($prefix));
					}
					else
						$field_name = $key;

					$field_values[$field_name] = $value;
				}
				
					
				if($update){
					//Update
					$new_id = $this->update($this->tableName, $field_values, array($where));
				}
				else{
					//Insert
					$result = $this->insert($this->tableName, $field_values);
					
					if($result !== false){
						$qry = "select last_insert_id()";
						$tmp_rt = $this->result_type ;
						$this->result_type = 1;
						$result = $this->query($qry);
						
						$this->result_type = $tmp_rt;
						$new_id = $result[0][0];
					}
					else
						$new_id = false;
				}        
			}
				
			return $new_id;
		}
		
		
		function setFields(){
			$sql = "SHOW FIELDS FROM `{$this->tableName}`";
			$t = $this->query($sql);
			if($t)
				$this->tables[$this->tableName] = $this->query($sql);
		}
		
		 function getFields($tname=false){
			if($tname && ($tname != $this->tableName))	return parent::getFields($tname);
		if(count($this->table_fields)) return $this->table_fields;
		return parent::getFields($this->tableName);
		}
		
		
		/*
		 * this function returns an array with all the containing needed data for this table.
		 */
		 function mapFields($data){
			$ret_data = array();
			if( !isset($this->tables[$this->tableName]) 
			 || count($this->tables[$this->tableName]))
				$this->setFields();
				
			foreach($this->tables[$this->tableName] as $field)
			$ret_data[$field['Field']] = isset($data[$field['Field']]) ? $data[$field['Field']] : ((bool)$field['Null'] ? null : false);
		
			return $ret_data;
		}
		
		 function get($var){
			return (isset($this->$var) ? $this->$var : null);
		}
		
	}
?>
