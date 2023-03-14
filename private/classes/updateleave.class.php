<?php

class updateleave extends Databaseobject
{
        static $table_name="tblleaves";
        static protected  $db_columns=['id','Status'];


 
        public  $id;
        public $Status; 
      

        public function __construct($arg=[])
        {
           
            
               $this->id = $arg["id"]; 
            
              $this->Status = $arg["Status"];
        }

protected function validate() {
    $this->errors = [];
   
       if(is_blank($this->id)) {
      $this->errors[] = "Job description cannot be blank.";
    } elseif (!has_length($this->id, array('min' => 0, 'max' =>90000000000 ))) {
      $this->errors[] = "Job description must be between 2 and 90000000000 characters.";
    }

    if(is_blank( $this->Status)) {
      $this->errors[] = "Job description cannot be blank.";
    } elseif (!has_length( $this->Status, array('min' => 0, 'max' =>90000000000 ))) {
      $this->errors[] = "Job description must be between 0 and 90000000000 characters.";
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

  

}


?>
