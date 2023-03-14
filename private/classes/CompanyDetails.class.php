<?php
    class CompanyDetails extends Databaseobject
    {
        static $table_name="tblcompany";
        static protected  $db_columns=['uniqueId','CompanyName','ImagePath'];

        public  $uniqueId;
        public $CompanyName; 
        public  $ImagePath;

        public function __construct($arg=[])
        {
              $this->uniqueId = $arg["uuid"]; 
              $this->CompanyName = $arg["company_name"];
              $this->ImagePath = $arg["logopath"];
        }

        protected function validate() {
            return;
         // }
        
          
        
        }
        

    }
    
?>