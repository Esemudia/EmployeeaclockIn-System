<?php

class User extends Databaseobject 
{

    static $table_name="tblemployees";
    static protected $db_columns=['EmpId','FirstName','LastName','EmailId','Password','Dob' ,'Department','Address','City','Country','Phonenumber','Status','RegDate'];
    
    public $empid;
    public $FirstName;
    public $LastName;
    public $EmailId;
    public $Password;
    public $Dob;
    public $Department;
    public $Address;
    public $City;
    public $Country;
    public $Phonenumber;
    public $Status;
    public $RegDate;
    //array of values
    public function __construct($args=[])
    { 
      $this->EmpId = $args["EmpId"];
        $this->FirstName = $args["firstname"];
        $this->LastName = $args["lastname"] ?? '';
        $this->EmailId = $args["email"] ?? '';
        $this->Password = $args["pword"] ?? '';
        $this->Dob = $args["Dob"] ?? '';
        $this->Department = $args["Department"] ?? '';
        $this->Address = $args["Address"] ?? '';
        $this->City = $args["City"] ?? '';
        $this->Country = $args["Country"] ?? '';
        $this->Phonenumber = $args["Phonenumber"] ?? '';
        $this->Status = $args["Status"] ?? '';
        $this->RegDate = $args["RegDate"] ?? '';
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

        // if(is_blank(  $this->LastName)) {
        //   $this->errors[] = "First name cannot be blank.";
        // } elseif (!has_length($this->LastName, array('min' => 2, 'max' => 255))) {
        //   $this->errors[] = "Fullname must be between 2 and 255 characters.";
        // }
    
        // if(is_blank($this->Email)) {
        //   $this->errors[] = "Email cannot be blank.";
        // } elseif (!has_length($this->Email, array('max' => 255))) {
        //   $this->errors[] = "Last name must be less than 255 characters.";
        // } elseif (!has_valid_email_format($this->Email)) {
        //   $this->errors[] = "Email must be a valid format.";
        // }
    
        // if(is_blank($this->password)) {
        //   $this->errors[] = "password cannot be blank.";
        // } elseif (!has_length($this->password, array('min' => 8, 'max' => 255))) {
        //   $this->errors[] = "password must be between 8 and 255 characters.";
        // } elseif (!has_length($this->password, $this->id ?? 0)) {
        //   $this->errors[] = "Username not allowed. Try another.";
        // }
    
       
        return $this->errors;
      }
    


}
?>