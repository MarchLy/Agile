<?php
class CommentRatingModel{
    public $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function avgRating($productId){
        $sql = "SELECT AVG(rating) as avgRating  FROM product_rating WHERE product_id = :product_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':product_id',$productId);
        $stmt->execute();
        return  $stmt->fetch()->avgRating;
     
// upadte
    }
    public function countComment($productId){
        $sql = "SELECT COUNT(id) as countComment FROM `product_comment` WHERE product_id = :product_id and parent is null";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':product_id',$productId);
        $stmt->execute();
        return  $stmt->fetch()->countComment;
    }

    public function showCommentDetail(){
        $product_id = $_GET['id'];
        $sql = "SELECT product_comment.*,users.name 
        FROM `product_comment` join users on product_comment.user_id = users.id 
        WHERE product_comment.product_id = :product_id and users.role !=1";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':product_id',$product_id);
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public function commentReply(){
        $productId = $_POST['product-id'];
        $commentId = (int)($_POST['comment-id'] ?? 0);
        $reply = $_POST['reply'];
        $now = date('Y-m-d H:i:s');
        $sql = "INSERT INTO `product_comment`(`product_id`, `user_id`, `comment`, `created_at`, `parent`)
         VALUES (:product_id,:user_id,:comment,:created_at,:parent)";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':product_id',$productId);
        $stmt->bindParam(':user_id',$_SESSION['users']['id']);
        $stmt->bindParam(':comment',$reply);
        $stmt->bindParam(':created_at',$now);
        $stmt->bindParam(':parent',$commentId);
        return $stmt->execute();
       
       
    }

   
}

?>