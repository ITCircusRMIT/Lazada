<?php
class ProductUpload {
    private $productName;
    private $productPrice;
    private $productDescription;
    private $productImage;
    public $error;
    public $success;
    private $storage = "vendor1.json";
    private $stored_products;
    private $new_product;

    public function __construct($productName, $productPrice, $productDescription) {
        $this->productName = trim($this->productName);
        $this->productName = filter_var($productName, FILTER_SANITIZE_STRING);

        $this->productPrice = filter_var(trim($productPrice), FILTER_SANITIZE_STRING);
        $this->productPrice = filter_var(number_format($this->productPrice), FILTER_SANITIZE_STRING);

        $this->productDescription = filter_var(trim($productDescription), FILTER_SANITIZE_STRING);
        $this->productDescription = filter_var($this->productDescription, FILTER_SANITIZE_STRING);
        
        $this->productImage = $_FILES['file']['name'];

        $this->stored_products = json_decode(file_get_contents($this->storage), true);

        $this->new_product = [
            "seller" => $_SESSION['user'],
            "productName" => $this->productName,
            "productPrice" => $this->productPrice,
            "productDescription" => $this->productDescription,
            "productImage" => $this->productImage
        ];

        $this->new_image =  $this->productImage;

        if ($this->checkFieldValues()) {
            $this->insertProduct();
        }
    }

    private function checkFieldValues() {
        if (empty($this->productName) || empty($this->productPrice) || empty($this->productDescription)) {
            $this->error = "All fields are required";
            return false;
        } else {
            return true;
        }
    }

    private function insertProduct() {
        array_push($this->stored_products, $this->new_product);
            if (file_put_contents($this->storage, json_encode($this->stored_products, JSON_PRETTY_PRINT))) {
                $this->success = "Product Added";
            } else {
                $this->error = "Something went wrong. Please try again later";
            }
    }
}