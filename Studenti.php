<?php
class Studenti {
    private $connection;
    private $table_name = 'Studenti'; 
    public function __construct($db) {
        $this->connection = $db;
    }

    public function register($name, $surname, $email, $password, $role = 'User'): bool {
       $checkQuery = "SELECT id FROM {$this->table_name} WHERE email = :email";
        $checkStmt = $this->connection->prepare($checkQuery);
         $checkStmt->bindParam(':email', $email); 
         $checkStmt->execute();
         
         if ($checkStmt->fetch()) { 
           return false;
        }
       
       
       $query = "INSERT INTO {$this->table_name} (name, surname, email, password, role) 
                  VALUES(:name, :surname, :email, :password, :role)";
        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':email', $email);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $hashedPassword);

        $stmt->bindParam(':role', $role);

        return $stmt->execute();
    }

    public function login($email, $password): bool {
        $query = "SELECT id, name, surname, email, password, role 
                  FROM {$this->table_name} WHERE email = :email";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && password_verify($password, $row['password'])) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email']   = $row['email'];
            $_SESSION['role']    = $row['role'];

            if ($email === 'ga1@gmail.com' || $email === 'godenii@gmail.com' || $email === '1234@gmail.com') {
                header("Location: dashboard.php");
            } else {
                header("Location: Home.php");
            }
            exit;
        }
        return false;
    }
}
?>
