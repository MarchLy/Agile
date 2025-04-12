<?php
class UserController
{
    public function getAllUser()
    {
        $userModel = new UserModel();
        $listUser  = $userModel->getAllData();
        include 'app/Views/Admin/user.php';
    }

    public function addUser()
    {
        include 'app/Views/Admin/add-user.php';
    }
    public function checkValidate(){
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $address  = $_POST['address'];
    $phone    = $_POST['phone'];
    if (!empty($name) && !empty($email) && !empty($address) && !empty($phone) && !empty($role)) {
        return true;
    } else {
        $_SESSION['error']="Bạn nhập thiếu thông tin";
        return false;
    }
    
    }
    public function addPostUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $uploadDir  = 'assets/Admin/upload/';
            $allowTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];
            $deshPath   = "";
            if (! empty($_FILES['image']['name'])) {
                $fileTmpPath   = $_FILES['image']['tmp_name'];
                $fileType      = mime_content_type($fileTmpPath);
                $fileName      = basename($_FILES['image']['name']);
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $newFileName   = uniqid() . "." . $fileExtension;

                if (in_array($fileType, $allowTypes)) {
                    $deshPath = $uploadDir . $newFileName;

                    if (! move_uploaded_file($fileTmpPath, $deshPath)) {
                        $_SESSION['message'] = "Không thể tải ảnh lên. Vui lòng thử lại.";
                        header("Location: " . BASE_URL . "?role=admin&act=add-user");
                        exit;
                    }
                } else {
                    $_SESSION['message'] = "Định dạng file không hợp lệ. Vui lòng chọn file ảnh.";
                    header("Location: " . BASE_URL . "?role=admin&act=add-user");
                    exit;
                }
            }

            $userModel = new UserModel();
            try {
                $message = $userModel->addUserToDB($deshPath);

                if ($message) {
                    $_SESSION['message'] = "Thêm mới thành công";
                    header("Location: " . BASE_URL . "?role=admin&act=all-user");
                    exit;
                } else {
                    throw new Exception("Thêm mới thất bại do lỗi cơ sở dữ liệu.");
                }
            } catch (Exception $e) {
                $_SESSION['message'] = $e->getMessage();
                header("Location: " . BASE_URL . "?role=admin&act=add-user");
                exit;
            }
        } else {
            $_SESSION['message'] = "Yêu cầu không hợp lệ.";
            header("Location: " . BASE_URL . "?role=admin&act=add-user");
            exit;
        }
    }
    public function updateUser()
    {
        if (! isset($_GET['id'])) {
            $_SESSION['message'] = "Vui lòng chọn USER cần sửa";
            header("Location: " . BASE_URL . "?role=admin&act=all-user");
            exit;
        }
       
        $id        = $_GET['id'];
        $userModel = new UserModel();
        $user      = $userModel->getUserByID();
        if (! $user) {
            $_SESSION['message'] = "Không tìm thấy dữ liệu  ";
            header("Location: " . BASE_URL . "?role=admin&act=all-user");
            exit;
        }
        include 'app/Views/Admin/update-user.php';
    }
    public function updatePostUser()
    {
        if (! isset($_GET['id'])) {
            $_SESSION['message'] = "Vui lòng chọn USER cần sửa";
            header("Location: " . BASE_URL . "?role=admin&act=all-user");
            exit;
        }
            $userModel = new UserModel();
            $user= $userModel->getUserByID();

            $uploadDir  = 'assets/Admin/upload/';
            $allowTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];
            $deshPath   = "";
            if (! empty($_FILES['image']['name'])) {
                $fileTmpPath   = $_FILES['image']['tmp_name'];
                $fileType      = mime_content_type($fileTmpPath);
                $fileName      = basename($_FILES['image']['name']);
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $newFileName   = uniqid() . "." . $fileExtension;

                if (in_array($fileType, $allowTypes)) {
                    $deshPath = $uploadDir . $newFileName;
                
                    // **Xóa ảnh cũ trước khi tải ảnh mới**
                    if (!empty($user->image) && file_exists($user->image)) {
                        unlink($user->image);
                    }
                
                    if (!move_uploaded_file($fileTmpPath, $deshPath)) {
                        $_SESSION['message'] = "Không thể tải ảnh lên. Vui lòng thử lại.";
                        header("Location: " . BASE_URL . "?role=admin&act=add-user");
                        exit;
                    }
                } else {
                    $_SESSION['message'] = "Định dạng file không hợp lệ. Vui lòng chọn file ảnh.";
                    header("Location: " . BASE_URL . "?role=admin&act=add-user");
                    exit;
                }
            }

            $userModel = new UserModel();
            try {
                $message = $userModel->updateUserToDB($deshPath);

                if ($message) {
                    $_SESSION['message'] = "Chỉnh sửa  thành công";
                    header("Location: " . BASE_URL . "?role=admin&act=all-user");
                    exit;
                } else {
                    throw new Exception("Chỉnh sửa thất bại do lỗi cơ sở dữ liệu.");
                }
            } catch (Exception $e) {
                $_SESSION['message'] = $e->getMessage();
                header("Location: " . BASE_URL . "?role=admin&act=add-user");
                exit;
            }
        
            $_SESSION['message'] = "Yêu cầu không hợp lệ.";
            header("Location: " . BASE_URL . "?role=admin&act=update-user&id=". $_GET['id']);
            exit;
    }
    public function deleteUser(){
        if (! isset($_GET['id'])) {
            $_SESSION['message'] = "Vui lòng chọn USER cần xóa";
            header("Location: " . BASE_URL . "?role=admin&act=all-user");
            exit;
        }
        $userModel = new UserModel();
        $user= $userModel->getUserByID();
        // xoa anh
        if($user->image !=""&& $user->image !=null){
            unlink($user->image);
        }
        $message = $userModel->deleteUser();
        if ($message) {
            $_SESSION['message'] = "Xóa thành công";
            header("Location: " . BASE_URL . "?role=admin&act=all-user");
            exit;
        } else {
            $_SESSION['message'] = "Xóa không thành công";
            header("Location: " . BASE_URL . "?role=admin&act=all-user");
            exit;
        }
    }
}
