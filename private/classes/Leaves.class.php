

<?php

class Leaves extends Databaseobject
{
        static $table_name="tblleaves";
        static protected  $db_columns=['LeaveType','ToDate','FromDate','Description','Status','IsRead','empid'];


 
        public  $DepartmentName;
        public $DepartmentShortName; 
        public  $DepartmentCode;
        public   $CreationDate; 
      

        public function __construct($arg=[])
        {
              $this->LeaveType = $arg["LeaveType"]; 
              $this->ToDate = $arg["ToDate"];
              $this->FromDate = $arg["FromDate"];
              $this->Description = $arg["Description"];
              $this->Status = $arg["Status"];
              $this->IsRead = $arg["IsRead"];
              $this->empid = $arg["empid"];
        }

protected function validate() {
    $this->errors = [];
   
       if(is_blank($this->LeaveType)) {
      $this->errors[] = "Job description cannot be blank.";
    } elseif (!has_length($this->Description, array('min' => 2, 'max' =>90000000000 ))) {
      $this->errors[] = "Job description must be between 2 and 90000000000 characters.";
    }

    if(is_blank($this->LeaveType)) {
      $this->errors[] = "Job description cannot be blank.";
    } elseif (!has_length($this->Description, array('min' => 2, 'max' =>90000000000 ))) {
      $this->errors[] = "Job description must be between 2 and 90000000000 characters.";
    }
    
   

    // if(is_blank($this->Contract_refcode)) {
    //   $this->errors[] = "Contract refcode cannot be blank.";
    // } elseif (!has_length($this->Contract_refcode, array('max' => 90000000000))) {
    //   $this->errors[] = "Contract refcode must be less than 255 characters.";
    // } 

    // if(is_blank($this->Deliverables)) {
    //   $this->errors[] = "Deliverables cannot be blank.";
    // } elseif (!has_length($this->Deliverables, array('min' => 8, 'max' => 255))) {
    //   $this->errors[] = "Deliverables must be between 8 and 255 characters.";
    // } 

   
    return $this->errors;
  }

  static public function fetchleave($value)
      {
          $id= self::$database->escape_string($value);
          $sql="SELECT * FROM ". static::$table_name  ." WHERE empid='$id'";
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
