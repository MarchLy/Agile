<?php
class ProductModel{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllProduct(){
        $sql = "SELECT products.id,products.name,products.price,products.price_sale,products.category_id,products.stock,products.image_main,categories.name as categoryName FROM `products` join categories on products.category_id=categories.id";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }
    public function addProductToDB($destPath){
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $pricesale = $_POST['pricesale'];
        $stock = $_POST['stock'];
        $description = $_POST['description'];
        $now = date('Y-m-d H:i:s');
        $imageDes= $destPath;

        $sql="
        INSERT INTO `products`( `name`, `category_id`, `description`, `price`, `price_sale`, `stock`, `image_main`, `created_at`, `updated_at`) VALUES
         (:name,:category_id,:description,:price,:price_sale,:stock,:image_main,:created_at,:updated_at)
        ";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':category_id', $category);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':price_sale', $pricesale);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':image_main', $imageDes);
        $stmt->bindParam(':created_at', $now);
        $stmt->bindParam(':updated_at', $now);
      
        if($stmt->execute()){
          $lastInsertId = $this->db->pdo->lastInsertId();
          return $lastInsertId;
        }else{
            return false;
        }

    }
    public function addImageToDB($idProduct,$destPathImage){
        if (!empty($destPathImage)) {
        $sql="
        INSERT INTO `product_image`(`product_id`, `image`) VALUES (:product_id,:image)
        ";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $idProduct);
        $stmt->bindParam(':image', $destPathImage);
        return $stmt->execute();
        }else{
            echo "Đường dẫn ảnh rỗng, không lưu vào CSDL!";
        return false;
        }
    }
    public function isProductExists($name, $category_id)
    {
        $sql = "SELECT COUNT(*) FROM products WHERE name = :name AND category_id = :category_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
        return $stmt->fetchColumn() > 0; // Trả về true nếu sản phẩm đã tồn tại cùng danh mục
    }

    public function getProductByID(){
        $id = $_GET['id'];
        $sql = "select * from products where id=:id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
       if($stmt->execute()){
          return $stmt->fetch();
        
       }
       return false;
    }
    public function getProductImageById(){
        $id = $_GET['id'];
        $sql = "select * from product_image where product_id=:product_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $id);
       if($stmt->execute()){
          return  $stmt->fetchAll();
       }
       return false;
    }
    public function deleteProductToDB() {
        $id = $_GET['id'];
    
        // Xóa sản phẩm khỏi order_detail trước
        $sqlOrderDetail = "DELETE FROM `order_detail` WHERE product_id = :product_id";
        $stmtOrderDetail = $this->db->pdo->prepare($sqlOrderDetail);
        $stmtOrderDetail->bindParam(':product_id', $id);
        $stmtOrderDetail->execute();
    
        // Xóa sản phẩm khỏi cart_detail trước
        $sqlCartDetail = "DELETE FROM `cart_detail` WHERE product_id = :product_id";
        $stmtCartDetail = $this->db->pdo->prepare($sqlCartDetail);
        $stmtCartDetail->bindParam(':product_id', $id);
        $stmtCartDetail->execute();
    
        // Xóa ảnh sản phẩm trước
        $sqlProductImage = "DELETE FROM `product_image` WHERE product_id = :product_id";
        $stmt1 = $this->db->pdo->prepare($sqlProductImage);
        $stmt1->bindParam(':product_id', $id);
        $stmt1->execute();
    
        // Xóa sản phẩm trong bảng products
        $sqlProduct = "DELETE FROM `products` WHERE id = :id";
        $stmt2 = $this->db->pdo->prepare($sqlProduct);
        $stmt2->bindParam(':id', $id);
    
        // Kiểm tra nếu tất cả đều xóa thành công
        if ($stmt2->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function updateProductToDB($destPath){
        $id = $_GET['id'];
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $pricesale = $_POST['pricesale'];
        $stock = $_POST['stock'];
        $description = $_POST['description'];
        $now = date('Y-m-d H:i:s');
        $imageDes= $destPath;

        $sql="
        UPDATE `products` SET `name`=:name,`category_id`=:category_id,`description`=:description,`price`=:price,`price_sale`=:price_sale,`stock`=:stock,`image_main`=:image_main,`updated_at`=:updated_at WHERE id=:id
        ";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':category_id', $category);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':price_sale', $pricesale);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':image_main', $imageDes);
        $stmt->bindParam(':updated_at', $now);
        $stmt->bindParam(':id', $id);
      
       return $stmt->execute();

    }
    public function deleteImageToDB(){
        $id = $_GET['id'];
        $sqlProductImage = "DELETE FROM `product_image` WHERE product_id = :product_id";
        $stmt = $this->db->pdo->prepare($sqlProductImage); // Sử dụng $sqlProductImage thay vì $sql
        $stmt->bindParam(':product_id', $id);
        return $stmt->execute();
    }    
}
