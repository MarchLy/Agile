<?php

class CommentRatingController extends ControllerAdmin{
             public function shComment(){
                $productModel = new ProductModel();
                $listProduct = $productModel->getAllProduct();
                $commentRatingModel = new CommentRatingModel();
                foreach($listProduct as $key => $value){
                    $listProduct[$key]->avgRating = $commentRatingModel->avgRating($value->id);
                    $listProduct[$key]->countComment = $commentRatingModel->countComment($value->id);
                }
               
                include "app/Views/Admin/comment.php";
             }
             public function commentDetail(){
                $productModel = new ProductModel();
                $product = $productModel->getProductByID();
                $commentRatingModel = new CommentRatingModel();
                $commentDetail = $commentRatingModel->showCommentDetail();
                include "app/Views/Admin/comment-detail.php";
             }

             public function commentReply(){
                $commentRatingModel = new CommentRatingModel();
                $commentRatingModel->commentReply();

                header("Location:".BASE_URL."?role=admin&act=comment-detail?id=".$_POST['product_id']);
             }
}