<?php
class Inquiry {
    public $id;
    public $property_id;
    public $name;
    public $email;
    public $message;
    public $created_at;
    public function __construct($id, $property_id, $name, $email, $message, $created_at) {
        $this->id = $id;
        $this->property_id = $property_id;
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
        $this->created_at = $created_at;
    }
}
?>
