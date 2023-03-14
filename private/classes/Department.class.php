<?php

class Department extends Databaseobject
{
        static $table_name="tbldepartments";
        static protected  $db_columns=['DepartmentName' ,	'DepartmentShortName' ,	'DepartmentCode' ,	'CreationDate'];


 
        public  $DepartmentName;
        public $DepartmentShortName; 
        public  $DepartmentCode;
        public   $CreationDate; 
      

        public function __construct($arg=[])
        {
            $this->DepartmentName = $arg["DepartmentName"]; 
            $this->DepartmentShortName = $arg["DepartmentShortName"];
            $this->DepartmentCode = $arg["DepartmentCode"]; 
            $this->CreationDate = $arg["CreationDate"];
        }

protected function validate() {
    $this->errors = [];

    if(is_blank($this->DepartmentName)) {
      $this->errors[] = "Department name not found.";
    } elseif (!has_length($this->DepartmentName, array('min' => 2, 'max' =>90000000000 ))) {
      $this->errors[] = "Department name must be between 2 and 90000000000 characters.";
    }

    // if(is_blank($this->DepartmentShortName)) {
    //   $this->errors[] = "Department Short Name cannot be blank.";
    // } elseif (!has_length($this->DepartmentShortName, array('min' => 2,'max' => 90000000000))) {
    //   $this->errors[] = "Department Short Name must be between 2 and 90000000000 characters.";
    // } 

    // if(is_blank($this->DepartmentCode)) {
    //   $this->errors[] = "Department Code cannot be blank.";
    // } elseif (!has_length($this->DepartmentCode, array('min' => 8, 'max' => 255))) {
    //   $this->errors[] = "Department Code must be between 8 and 255 characters.";
    // } 

   
    return $this->errors;
  }

  static public function fetchdepartment($value)
      {
          $id= self::$database->escape_string($value);
          $sql="SELECT * FROM ". static::$table_name  ." ";
          $obj = static::getlogin($sql);
          if (!empty($obj)) {
             return array_shift($obj);
          }
          else{
              return false;
          }
      }

}


?>
