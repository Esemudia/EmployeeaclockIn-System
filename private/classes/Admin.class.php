<?php

class Admin extends Databaseobject 
{

    static $table_name="tblemployees";
    static protected $db_columns=['FirstName','LastName','EmailId','Password'];
    
    
    public $FirstName;
    public $LastName;
    public $EmailId;
    public $Password;
    
    //array of values
    public function __construct($args=[])
    { 
        $this->FirstName = $args["FirstName"];
        $this->LastName = $args["LastName"] ?? '';
        $this->EmailId = $args["email"] ?? '';
        $this->Password = $args["pword"] ?? '';
        
    }

    static public function login($email,$pass)
    {
        $email= self::$database->escape_string($email);
        $password= self::$database->escape_string($pass);
        $sql="SELECT * FROM ". static::$table_name  ." WHERE EmailId='$email' and Password='$password'";
        $obj = static::getlogin($sql);
        if (!empty($obj)) {
           return array_shift($obj);
        }
        else{
            return false;
        }
    }

   

    protected function validate() {
        $this->errors = [];
    
        if(is_blank( $this->FirstName)) {
          $this->errors[] = "First name cannot be blank.";
        } elseif (!has_length($this->FirstName, array('min' => 2, 'max' => 255))) {
          $this->errors[] = "Fullname must be between 2 and 255 characters.";
        }

        if(is_blank(  $this->LastName)) {
          $this->errors[] = "First name cannot be blank.";
        } elseif (!has_length($this->LastName, array('min' => 2, 'max' => 255))) {
          $this->errors[] = "Fullname must be between 2 and 255 characters.";
        }
    
        if(is_blank($this->Email)) {
          $this->errors[] = "Email cannot be blank.";
        } elseif (!has_length($this->Email, array('max' => 255))) {
          $this->errors[] = "Last name must be less than 255 characters.";
        } elseif (!has_valid_email_format($this->Email)) {
          $this->errors[] = "Email must be a valid format.";
        }
    
        if(is_blank($this->password)) {
          $this->errors[] = "password cannot be blank.";
        } elseif (!has_length($this->password, array('min' => 8, 'max' => 255))) {
          $this->errors[] = "password must be between 8 and 255 characters.";
        } elseif (!has_length($this->password, $this->id ?? 0)) {
          $this->errors[] = "Username not allowed. Try another.";
        }
    
       
        return $this->errors;
      }
    


}
?>