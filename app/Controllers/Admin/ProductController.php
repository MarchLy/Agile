<?php
class ProductController extends ControllerAdmin
{
   public function showAllProduct() {
       $productModel = new ProductModel();
       $listProduct = $productModel->getAllProduct();
       include 'app/Views/Admin/products.php';
   }

   public function addAllProduct() {
       $categoryModel = new CategoryModel(); // Sửa lại đúng class
       $listCategory = $categoryModel->getAllCategory();
       include 'app/Views/Admin/add-product.php';
   }
   public function checkValidate(){
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];   
    if($name != "" && $category != "" && $price != "" && $stock != "" ){
        return true;
    }else{
        $_SESSION['error'] = "Bạn nhập thiếu thông tin";
        return false;
    }
   }
   public function addPostProduct(){
    if($_SERVER['REQUEST_METHOD'] ==  'POST'){
        if(!$this->checkValidate()){
            header("Location: ".BASE_URL."?role=admin&act=add-product");
            exit;
        }
        // kiểm tra sản phẩm đã tồn tại hay chưa 
     $productModel = new ProductModel();
     $name = trim($_POST['name']);
     $category_id = $_POST['category']; // Lấy danh mục từ form

     // Kiểm tra nếu sản phẩm cùng tên và cùng danh mục đã tồn tại
     if ($productModel->isProductExists($name, $category_id)) {
         $_SESSION['message'] = "Sản phẩm này đã tồn tại trong danh mục được chọn!";
         header("Location: " . BASE_URL . "?role=admin&act=add-product");
         exit();
     }
        $uploadDir = 'assets/Admin/upload/';
        $allowTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];
        $destPath = "";
        if(!empty($_FILES['image_main']['name'])){
            $fileTmpPath = $_FILES['image_main']['tmp_name'];
            $fileType = mime_content_type($fileTmpPath);
            $fileName = basename($_FILES['image_main']['name']);
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            $newFileName = uniqid().".".$fileExtension;
            if(in_array($fileType, $allowTypes)){
                $destPath = $uploadDir.$newFileName;
                if(!move_uploaded_file($fileTmpPath, $destPath)){
                  $destPath = "";
                }
            }
        }
       
        $idProduct = $productModel->addProductToDB($destPath);
        if(!$idProduct){
            $_SESSION['message'] = "Thêm mới không thành công";
            header("Location: ".BASE_URL."?role=admin&act=all-product");
            exit;
        }
    }
///Thêm thư viện ảnh
          if(isset($_FILES['image'])){
            foreach($_FILES['image']['name'] as $key => $name){
                      $destPathImage = "";
                      if(!empty($name)){
                        $fileTmpPath = $_FILES['image']['tmp_name'][$key];
                        $fileType = mime_content_type($fileTmpPath);
                        $fileName = basename($name);
                        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                        $newFileName = uniqid().".".$fileExtension;
                        if(in_array($fileType, $allowTypes)){
                            $destPathImage = $uploadDir.$newFileName;
                            if(!move_uploaded_file($fileTmpPath, $destPathImage)){
                              $destPathImage = "";
                         }
                     }
                 }
                    $productModel->addImageToDB($idProduct, $destPathImage);
             }
             $_SESSION['message'] = "Thêm mới thành công";
             header("Location: ".BASE_URL."?role=admin&act=all-product");
             exit;
          }
        }
        public function deleteProduct(){
            if (! isset($_GET['id'])) {
                $_SESSION['message'] = "Vui lòng chọn product cần xóa";
                header("Location: " . BASE_URL . "?role=admin&act=all-product");
                exit;
            }
            $productModel = new ProductModel();
            //Xóa ảnh
            $product= $productModel->getProductByID();
            if($product->image_main != null){
                unlink($product->image_main);
            }
            //Xóa ảnh trong PRODUCT_IMAGE
            $listImage=$productModel->getProductImageById();
            foreach($listImage as $key => $value){
                if($value->image != null){
                    unlink($value->image);
                }
            }


            $message = $productModel->deleteProductToDB();
            
            if ($message) {
                $_SESSION['message'] = "Xóa thành công";
                header("Location: " . BASE_URL . "?role=admin&act=all-product");
                exit;
            } else {
                $_SESSION['message'] = "Xóa không thành công";
                header("Location: " . BASE_URL . "?role=admin&act=all-product");
                exit;
            }
        }
        public function updateProduct(){
            if(!isset($_GET['id'])){
                $_SESSION['message'] = "Vui lòng chọn product cần sửa";
                header("Location: ".BASE_URL."?role=admin&act=all-product");
                exit;
            }
            $categoryModel = new CategoryModel();
            $listCategory = $categoryModel->getAllCategory();

            $productModel = new ProductModel(); 
            $product = $productModel->getProductByID();
            $listProductImage = $productModel->getProductImageById();
            include 'app/Views/Admin/update-product.php';
        }
        public function updatePostProduct(){
            if($_SERVER['REQUEST_METHOD'] ==  'POST'){
                if(!isset($_GET['id'])){
                    $_SESSION['message'] = "Vui lòng chọn product cần sửa";
                    header("Location: ".BASE_URL."?role=admin&act=all-product");
                    exit;
                }
                if(!$this->checkValidate()){
                    header("Location: ".BASE_URL."?role=admin&act=update-product&id=".$_GET['id']);
                    exit;
                }
                $productModel = new ProductModel(); 
                $product = $productModel->getProductByID();
                $uploadDir = 'assets/Admin/upload/';
                $allowTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];
                $destPath = $product->image_main;
                if(!empty($_FILES['image_main']['name'])){
                    $fileTmpPath = $_FILES['image_main']['tmp_name'];
                    $fileType = mime_content_type($fileTmpPath);
                    $fileName = basename($_FILES['image_main']['name']);
                    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
                    $newFileName = uniqid().".".$fileExtension;
                    if(in_array($fileType, $allowTypes)){
                        $destPath = $uploadDir.$newFileName;
                        if(!move_uploaded_file($fileTmpPath, $destPath)){
                          $destPath = "";
                        }
                        unlink($product->image_main);
                    }
                }
                $productModel = new ProductModel();
                $message= $productModel->updateProductToDB($destPath);
                if(!$message){
                    $_SESSION['message'] = "Chỉnh sửa không thành công";
                    header("Location: ".BASE_URL."?role=admin&act=update-product&id=".$_GET['id']);
                    exit;
                }
            
        //Thêm thư viện ảnh
                  if(isset($_FILES['image']) && count($_FILES['image']) > 0){
                    $listImage=$productModel->getProductImageById();
                    foreach($listImage as $key => $value){
                        if($value->image != null){
                            unlink($value->image);
                        }
                    }
                    $productModel->deleteImageToDB($_GET['id']);
                    foreach($_FILES['image']['name'] as $key => $name){
                              $destPathImage = "";
                              if(!empty($name)){
                                $fileTmpPath = $_FILES['image']['tmp_name'][$key];
                                $fileType = mime_content_type($fileTmpPath);
                                $fileName = basename($name);
                                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                                $newFileName = uniqid().".".$fileExtension;
                                if(in_array($fileType, $allowTypes)){
                                    $destPathImage = $uploadDir.$newFileName;
                                    if(!move_uploaded_file($fileTmpPath, $destPathImage)){
                                      $destPathImage = "";
                                 }
                             }
                         }
                            $productModel->addImageToDB($_GET['id'], $destPathImage);
                     }
                }
        
                     $_SESSION['message'] = "Chỉnh sửa thành công";
                     header("Location: ".BASE_URL."?role=admin&act=all-product" );
                     exit;
                  }
                  
        }
    }
    
  
