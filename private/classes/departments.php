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
            $this->DepartmentName = $arg["id"]; 
            $this->DepartmentShortName = $arg["Contract_refcode"];
            $this->DepartmentCode = $arg["Job_description"]; 
            $this->CreationDate = $arg["Location"];
        }

protected function validate() {
    $this->errors = [];

    if(is_blank($this->Job_description)) {
      $this->errors[] = "Job description cannot be blank.";
    } elseif (!has_length($this->Job_description, array('min' => 2, 'max' =>90000000000 ))) {
      $this->errors[] = "Job description must be between 2 and 90000000000 characters.";
    }

    if(is_blank($this->Contract_refcode)) {
      $this->errors[] = "Contract refcode cannot be blank.";
    } elseif (!has_length($this->Contract_refcode, array('max' => 90000000000))) {
      $this->errors[] = "Contract refcode must be less than 255 characters.";
    } 

    if(is_blank($this->Deliverables)) {
      $this->errors[] = "Deliverables cannot be blank.";
    } elseif (!has_length($this->Deliverables, array('min' => 8, 'max' => 255))) {
      $this->errors[] = "Deliverables must be between 8 and 255 characters.";
    } 

   
    return $this->errors;
  }

  static public function fetchJoborder($value)
      {
          $id= self::$database->escape_string($value);
          $sql="SELECT * FROM ". static::$table_name  ." WHERE customer_Id='$id' OR artisan_Id='$id' ";
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
