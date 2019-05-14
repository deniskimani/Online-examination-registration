<?php
class User{

    // database connection and table name
    private $conn;
    private $table_name = "users";

    // object properties
    public $id;
    public $username;
    public $password;
    public $created;
    public $type;

    // constructor with $db as database connection
    public function __construct($db){  $this->conn = $db;}


    // signup user
    function signup(){
    if($this->isAlreadyExist()){
        return false;
    }
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                username=:username, password=:password, created=:created, type=:type";
    // prepare query
    $stmt = $this->conn->prepare($query);
    // sanitize
    $this->username=htmlspecialchars(strip_tags($this->username));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->created=htmlspecialchars(strip_tags($this->created));
    $this->type=htmlspecialchars(strip_tags($this->type));

    // bind values
    $stmt->bindParam(":username", $this->username);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":created", $this->created);
    $stmt->bindParam(":type", $this->type);


    // execute query
    if($stmt->execute()){
        $this->id = $this->conn->lastInsertId();
        return true;
    }
    return false;

}

   function isAlreadyExist(){
       $query = "SELECT *
           FROM
               " . $this->table_name . "
           WHERE
               username='".$this->username."'";
       // prepare query statement
       $stmt = $this->conn->prepare($query);
       // execute query
       $stmt->execute();
       if($stmt->rowCount() > 0){
           return true;
       }
       else{
           return false;
       }
   }
}
?>
