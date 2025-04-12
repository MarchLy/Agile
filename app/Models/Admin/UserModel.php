<?php
class UserModel
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllData()
    {
        $sql = "SELECT * FROM users";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }
    public function isEmailExists($email)
    {
        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function addUserToDB($deshPath)
    {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'] != "" ? password_hash($_POST['password'], PASSWORD_BCRYPT) :  password_hash($_POST['email'], PASSWORD_BCRYPT);

        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $role = $_POST['role'];
        $image = $deshPath;
        $now = date('Y-m-d H:i:s');
        if ($this->isEmailExists($email)) {
            throw new Exception("Email đã tồn tại trong hệ thống. Vui lòng chọn email khác.");
        }
        $sql = "INSERT INTO users (name, email, password, address, phone, image, created_at, updated_at, role)
                VALUES (:name, :email, :password, :address, :phone, :image, :created_at, :updated_at, :role)";

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':created_at', $now);
        $stmt->bindParam(':updated_at', $now);

        return $stmt->execute();
    }
    public function getUserByID()
    {
        $id = $_GET['id'];
        $sql = "select *from users where id =:id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $data = $stmt->execute();
        if ($stmt->execute()) {
            return $stmt->fetch();
        }
        return false;

    }
    public function updateUserToDB($deshPath)
{
    $user     = $this->getUserByID();
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'] != "" ? password_hash($_POST['password'], PASSWORD_BCRYPT) : $user->password;
    $address  = $_POST['address'];
    $phone    = $_POST['phone'];
    $role     = $_POST['role'];
    $image    = $deshPath;
    $now      = date('Y-m-d H:i:s');
    $id       = $_GET['id']; // Lấy ID từ URL

    // Kiểm tra email có tồn tại hay không
    if ($this->isEmailExists($email) && $email !== $user->email) {
        throw new Exception("Email đã tồn tại trong hệ thống. Vui lòng chọn email khác.");
    }

    // Câu lệnh SQL UPDATE
    $sql = "UPDATE users SET 
                name = :name, 
                email = :email, 
                password = :password, 
                address = :address, 
                phone = :phone, 
                image = :image, 
                updated_at = :updated_at, 
                role = :role 
            WHERE id = :id";

    $stmt = $this->db->pdo->prepare($sql);

    // Bind dữ liệu
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':updated_at', $now);
    $stmt->bindParam(':id', $id);

    return $stmt->execute();
}
public function deleteUser(){
    $id       = $_GET['id'];
   $sql=" DELETE FROM `users` WHERE id=:id";
   $stmt = $this->db->pdo->prepare($sql);
   $stmt->bindParam(':id', $id);
   return $stmt->execute();
  
}

}
