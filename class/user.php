<?php

/**
 * Description of user
 *
 * @author Szum
 */
class User {
    
    protected $id;
    protected $username;
    protected $email;
    protected $last_login;
    
    public function __construct($id, $username, $email, $last_login) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->last_login = $last_login;
    }
    
}

class Registered extends User {
    
    public function __construct($id, $username, $email, $last_login) {
        parent::__construct($id, $username, $email, $last_login);
        
    }
    
}