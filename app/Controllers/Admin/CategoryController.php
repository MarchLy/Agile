<?php
class CategoryController extends ControllerAdmin
{
    public function getAllCategory()
    {
        $categoryModel = new CategoryModel();
        $listCategory = $categoryModel->getAllCategory();
        include 'app/Views/Admin/categories.php';
    }
    public function addCategory()
    {
        include 'app/Views/Admin/add-category.php';
    }
    public function addPostCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!$this->checkValidate()) {
                header("Location:" . BASE_URL . "?role=admin&act=add-category");
                exit();
            }
    
            $categoryModel = new CategoryModel();
            // Kiểm tra trùng danh mục trước khi thêm mới
            if ($categoryModel->isCategoryExists($_POST['name'])) {
                $_SESSION['message'] = "Danh mục này đã tồn tại.";
                header("Location: " . BASE_URL . "?role=admin&act=add-category");
                exit;
            }
    
            $message = $categoryModel->addCategory();
            if ($message) {
                $_SESSION['message'] = "Thêm mới thành công";
                header("Location: " . BASE_URL . "?role=admin&act=all-category");
                exit;
            } else {
                $_SESSION['message'] = "Yêu cầu không hợp lệ.";
                header("Location: " . BASE_URL . "?role=admin&act=add-category");
                exit;
            }
        }
    }




    public function checkValidate()
    {
        $name = $_POST['name'];
        if ($name != "") {
            return true;
        } else {
            $_SESSION['error'] = "Bạn nhập thiếu thông tin";
            return false;
        }
    }
    public function deleteCategory()
    { 
        if (! isset($_GET['id'])) {
            $_SESSION['message'] = "Vui lòng chọn Category cần xóa";
            header("Location: " . BASE_URL . "?role=admin&act=all-category");
            exit;
        }
        $id = $_GET['id'];
        $categoryModel = new CategoryModel();
        $message = $categoryModel->deleteCategory($id);
        if ($message) {
            $_SESSION['message'] = "Xóa thành công";
        } else {
            $_SESSION['error'] = "Xóa thất bại";
        }
        header("Location: " . BASE_URL . "?role=admin&act=all-category");
        exit;
    }
    public function updateCategory()
    {
        if (! isset($_GET['id'])) {
            $_SESSION['message'] = "Vui lòng chọn Category cần sửa";
            header("Location: " . BASE_URL . "?role=admin&act=all-category");
            exit;
        }
        $id = $_GET['id'];
        $categoryModel = new CategoryModel();
        $category = $categoryModel->getCategoryById($id);
        include 'app/Views/Admin/update-category.php';
    }
    public function updatePostCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (! isset($_GET['id'])) {
                $_SESSION['message'] = "Vui lòng chọn Category cần sửa";
                header("Location: " . BASE_URL . "?role=admin&act=all-category");
                exit;
            }

            if (! $this->checkValidate()) {
                header("Location:" . BASE_URL . "?role=admin&act=update-category&id=" . $_GET['id']);
                exit();
            }
            $categoryModel = new CategoryModel();
            $message = $categoryModel->updateCategory();
            if ($message) {
                $_SESSION['message'] = "Cập nhật thành công";
                header("Location: " . BASE_URL . "?role=admin&act=all-category");
                exit;
            } else {
                $_SESSION['message'] = "Cập nhật thất bại";
                header("Location: " . BASE_URL . "?role=admin&act=update-category&id=" . $_GET['id']);
                exit;
            }
        } else {
            $_SESSION['message'] = "Yêu cầu không hợp lệ.";
            header("Location: " . BASE_URL . "?role=admin&act=update-category");
            exit;
        }
    }

    public function showCategory()
    {
       if (! isset($_GET['id'])) {
           $_SESSION['message'] = "Vui lòng chọn Category cần xem";
           header("Location: " . BASE_URL . "?role=admin&act=all-category");
           exit;
       }
       $categoryModel = new CategoryModel();
       $category = $categoryModel->getCategoryById($_GET['id']);
       include 'app/Views/Admin/show-category.php';
    }
    
}
