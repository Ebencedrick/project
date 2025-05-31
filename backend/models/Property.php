<?php
class Property {
    public $id;
    public $title;
    public $description;
    public $price;
    public $type;
    public $location;
    public $image;
    public $status;
    public $user_id;
    public $created_at;
    public function __construct($id, $title, $description, $price, $type, $location, $image, $status, $user_id, $created_at) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->type = $type;
        $this->location = $location;
        $this->image = $image;
        $this->status = $status;
        $this->user_id = $user_id;
        $this->created_at = $created_at;
    }
}
?>
