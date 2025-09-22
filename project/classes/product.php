<?php
require_once "database.php";

class Product {
    public $title = "";
    public $author = "";
    public $genre = "";
    public $publicationYear = "";

    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addProduct() {
        $sql = "INSERT INTO product (title, author, genre, publicationYear)
                VALUES (:title, :author, :genre, :publicationYear)"; // FIXED VALUES
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':title', $this->title);
        $query->bindParam(':author', $this->author);
        $query->bindParam(':genre', $this->genre);
        $query->bindParam(':publicationYear', $this->publicationYear);
        return $query->execute();
    }

    public function viewProduct() {
        $sql = "SELECT * FROM product ORDER BY title ASC;";
        $query = $this->db->connect()->prepare($sql);

        if ($query->execute()) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }
}
