<?php

class Databaseobject{
    static protected $database;
    static protected $table_name="";
    static protected $columns=[];
    public $errors=[];

    static public function setDatabase($database)
    {
        self::$database= $database;
    }

    //Login
    static public function getlogin($sql)
    {
        $result= self::$database->query($sql);
       
        if (!$result) {
            exit("Query Error");
        }
        $obj_arry= [];
        while($record =$result->fetch_assoc())
        {
            $obj_arry[]= $record;
        }
        $result->free();
        return  $obj_arry;
    }


        public function save()
        {
            if (isset($this->id)) {
                return $this->update();
            }
            else{
                return $this->create();
            }
        }
    //Instantiate the record

    static protected function instatiate($record)
    {
        $object = new static;
        foreach ($record as $key => $value) {
           if(property_exists($object,$key)) 
           {
               $object->$key = $value;
           }
        }
        return $object;

    }
    
    // Validation
    protected function validate()
    {
        $this->errors =[];

        return $this->errors;
    }

    //Store Values
    protected function create() {
        $this->validate();
        if(!empty($this->errors)) { return false; }
    
        $attribute = $this->sanitized_attribute();
        $sql = "INSERT INTO " . static::$table_name . " (";
        $sql .= join(', ', array_keys($attribute));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attribute));
        $sql .= "')";
        $result = self::$database->query($sql);
        if($result) {
          $this->id = self::$database->insert_id;
        }
        return $result;
      }

      protected function update() {
        $this->validate();
        if(!empty($this->errors)) { return false; }
        $attributes = $this->sanitized_attribute();
        $attribute_pairs = [];
        foreach($attributes as $key => $value) {
          $attribute_pairs[] = "{$key}='{$value}'";
        }
    
        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= join(', ', $attribute_pairs);
        $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;
      }

    public function merge_attributes($args=[])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this,$key) && !is_null($value)) {
                $this->$key=$value;
            }
        }
    }

    public function attribute()
    {
        $attributes=[];
        foreach(static::$db_columns as $column)
        {
            if ($column=='id') {
                continue;
            }
            $attributes[$column]=$this->$column;
        }
        return $attributes;
    }

    protected function sanitized_attribute()
    {
        $sanitized =[];
        foreach ($this->attribute() as $key => $value) {
            $sanitized[$key] = self::$database->escape_string($value);
        }
        return $sanitized;
    }

    
    static public function find_by_sql($sql) {
        $result = self::$database->query($sql);
        if(!$result) {
          exit("Database query failed.");
        }
    
        // results into objects
        
        $rows = array();
            while ($row = $result->fetch_assoc())
             {
                $rows[] = $row;
            }
    
        $result->free();
    
      return $rows;
      }
    
      static public function find_all() {
        $sql = "SELECT * FROM " . static::$table_name;
       return static::find_by_sql($sql);
      }
    
      static public function count_all() {
        $sql = "SELECT COUNT(*) FROM " . static::$table_name;
        $result_set = self::$database->query($sql);
        $row = $result_set->fetch_array();
        return array_shift($row);
      }


      
      static public function find_by_empID($id) {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE empId='" . self::$database->escape_string($id) . "'";
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array)) {
          return $obj_array;
        } else { 
                   return false;
        }
      }
    
      static public function find_by_emailid($id) {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE EmailId='" . self::$database->escape_string($id) . "'";
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array)) {
          return array_shift($obj_array);
        } else {
          return false;
        }
      }

      static public function find_by_id($id) {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array)) {
          return array_shift($obj_array);
        } else {
          return false;
        }
      }
      static protected function instantiate($record) {
        $object = new static;
        foreach($record as $property => $value) {
          if(property_exists($object, $property)) {
            $object->$property = $value;
          }
        }
        return $object;
      }
}
?>