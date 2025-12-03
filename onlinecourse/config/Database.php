<?php
class Database {
    private static $instance = null;
    private $conn;

    private $host = "localhost";
    private $dbname = "online_course";
    private $username = "root";
    private $password = "";

    // Constructor private để ngăn tạo nhiều kết nối
    private function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,   // Bật chế độ báo lỗi
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Kiểu fetch mặc định
                    PDO::ATTR_EMULATE_PREPARES => false, // Tắt giả lập prepare để bảo mật hơn
                ]
            );
        } catch (PDOException $e) {
            die("Lỗi kết nối CSDL: " . $e->getMessage());
        }
    }
}
?>
