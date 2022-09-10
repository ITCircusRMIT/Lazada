<?php
class RegisterLogistic {
    private $username;
    private $raw_password;
    private $encrypted_password;
    private $userAvatar;
    private $business;
    public $error;
    public $success;
    private $storage = "logistic_account.json";
    private $stored_users;
    private $new_user;

    public function __construct($username, $password, $business) {
        $this->username = trim($this->username);
        $this->username = filter_var($username, FILTER_SANITIZE_STRING);

        $this->raw_password = filter_var(trim($password), FILTER_SANITIZE_STRING);
        $this->encrypted_password = password_hash($this->raw_password, PASSWORD_DEFAULT);

        $this->business = filter_var(trim($_POST['business']), FILTER_SANITIZE_STRING);
        $this->business = filter_var($this->business, FILTER_SANITIZE_STRING);

        $this->userAvatar = $_FILES['file']['name'];

        $this->stored_users = json_decode(file_get_contents($this->storage), true);

        $this->new_user = [
            "username" => $this->username,
            "password" => $this->encrypted_password,
            "avatar" => $this->userAvatar,
            "business" => $this->business
        ];

        if ($this->checkFieldValues()) {
            $this->insertUser();
        }
    }

    private function checkFieldValues() {
        if (empty($this->username) || empty($this->raw_password) || empty($this->business)) {
            $this->error = "All fields are required";
            return false;
        } else {
            return true;
        }
    }

    private function usernameExists() {
        foreach ($this->stored_users as $user) {
            if ($this->username == $user['username']) {
                $this->error = "Username already taken";
                return true;
            }
        }
        return false;
    }

    private function insertUser() {
        if ($this->usernameExists() == FALSE) {
            array_push($this->stored_users, $this->new_user);
            if (file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))) {
                $this->success = "Registration successful!";
            } else {
                $this->error = "Something went wrong. Please try again later";
            }
        }
    }
}