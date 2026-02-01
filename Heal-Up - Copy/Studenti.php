<?php
class Studenti {
    private $connection;
    private $table_name = 'Studenti';

    public function __construct($db) {
        $this->connection = $db;
    }

    public function register($name, $surname, $email, $password, $role = 'user'): bool {
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

           
            if ($_POST['email'] === 'ag@gmail.com' || $_POST['email'] === 'godeni1@gmail.com' || $_POST['email'] === '123@gmail.com') {
                header("Location: dashboard.php");
            } else {
                header("Location: home.php");
            }
            exit;
        }
        return false;
    }
}
?>
