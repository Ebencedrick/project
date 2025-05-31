<?php
class User {
    public $id;
    public $name;
    public $email;
    public $role;
    public $created_at;
    public function __construct($id, $name, $email, $role, $created_at) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
        $this->created_at = $created_at;
    }
}
?>
