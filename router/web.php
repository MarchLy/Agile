<?php
$role = isset($_GET['role']) ? $_GET['role'] : "user";
$act = isset($_GET['act']) ? $_GET['act'] : "";

// choose role
if($role == "user"){
 switch($act){
    case '':{
        $dashBoardController = new DashboardController();
        $dashBoardController-> dashboard();
        break;
    }
    case 'login':{  
        $loginController = new LoginUserController();
        $loginController-> login();
        break;
    }
    case 'post-login':{  
        $loginController = new LoginUserController();
        $loginController-> postlogin();
        break;
    }
    case 'logout':{  
        $loginController = new LoginUserController();
        $loginController-> logout();
        break;
    }
    case 'register':{  
        $loginController = new LoginUserController();
        $loginController-> register();
        break;
    }
    case 'post-register':{  
        $loginController = new LoginUserController();
        $loginController-> postRegister();
        break;
    }
    case 'my-account':{  
        $dashBoardController = new DashboardController();
        $dashBoardController->myAccount();
        break;
    }
    case 'account-detail':{  
        $dashBoardController = new DashboardController();
        $dashBoardController->accountDetail();
        break;
    }
    case 'account-update':{  
        $dashBoardController = new DashboardController();
        $dashBoardController->accountUpdate();
        break;
    }
    case 'shop':{  
        $dashBoardController = new DashboardController();
        $dashBoardController->showshop();
        break;
    }
    case 'product-detail':{  
        $dashBoardController = new DashboardController();
        $dashBoardController->productDetail();
        break;
    }
    case 'write-review':{  
        $dashBoardController = new DashboardController();
        $dashBoardController->writeReview();
        break;
    }
    case 'add-to-cart':{  
        $dashBoardController = new DashboardController();
        $dashBoardController->addToCart();
        break;
    }
    case 'show-to-cart':{  
        $dashBoardController = new DashboardController();
        $dashBoardController->showToCart();
        break;
    }
    case 'update-cart':{  
        $dashBoardController = new DashboardController();
        $dashBoardController->updateToCart();
        break;
    }
    case 'shopping-cart':{  
        $dashBoardController = new DashboardController();
        $dashBoardController->shoppingCart();
        break;
    }
    case 'check-out':{  
        $dashBoardController = new DashboardController();
        $dashBoardController->checkOut();
        break;
    }
    case 'submit-check-out':{  
        $dashBoardController = new DashboardController();
        $dashBoardController->submitCheckOut();
        break;
    }
    case 'show-order':{  
        $dashBoardController = new DashboardController();
        $dashBoardController->showOrder();
        break;
    }
    case 'show-order-detail':{  
        $dashBoardController = new DashboardController();
        $dashBoardController->showOrderDetail();
        break;
    }
    case 'cancel-order':{  
        $dashBoardController = new DashboardController();
        $dashBoardController->cancelOrder();
        break;
    }


   
    
 }
}else{
switch($act){
    // http://localhost/Agile/?role=admin&act=home
    case 'home' :{
        $homeController = new HomeController();
        $homeController->dashboard();
        break;
    }
    // http://localhost/Agile/?role=admin&act=login
    case 'login' :{
        $homeController = new LoginController();
        $homeController->login();
        break;
    }
    // http://localhost/Agile/?role=admin&act=post-login

    case 'post-login' :{
        $homeController = new LoginController();
        $homeController->postLogin();
        break;
    }
    case 'logout' :{
        $loginController = new LoginController();
        $loginController->logout();
        break;
    }
    case 'all-user' :{
        $userController = new UserController();
        $userController->getAllUser();
        break;
    }
    case 'add-user' :{
        $userController = new UserController();
        $userController->addUser();
        break;
    }
    case 'post-add-user' :{
        $userController = new UserController();
        $userController->addPostUser();
        break;
    }
    case 'update-user' :{
        $userController = new UserController();
        $userController->updateUser();
        break;
    }
    case 'update-post-user' :{
        $userController = new UserController();
        $userController->updatePostUser();
        break;
    }
    case 'delete-user' :{
        $userController = new UserController();
        $userController->deleteUser();
        break;
    }
    // category
    case 'all-category' :{
        $categoryController = new CategoryController();
        $categoryController->getAllCategory();
        break;
    }
    case 'add-category' :{
        $categoryController = new CategoryController();
        $categoryController->addCategory();
        break;
    }
    case 'add-post-category' :{ 
        $categoryController = new CategoryController();
        $categoryController->addPostCategory();
        break;
    }
    case 'delete-category' :{ 
        $categoryController = new CategoryController();
        $categoryController->deleteCategory();
        break;
    }
    case 'update-category' :{ 
        $categoryController = new CategoryController();
        $categoryController->updateCategory();
        break;
    }
    case 'update-post-category' :{ 
        $categoryController = new CategoryController();
        $categoryController->updatePostCategory();
        break;
    }
    case 'show-category' :{
        $categoryController = new CategoryController();
        $categoryController->showCategory();
        break;
    }
    //product
    case 'all-product':{
        $productController = new ProductController();
        $productController->showAllProduct();
        break;
    }
    case 'add-product':{
        $productController = new ProductController();
        $productController->addAllProduct();
        break;
    }
    case 'add-post-product':{
        $productController = new ProductController();
        $productController->addPostProduct();
        break;
    }
    case 'delete-product':{
        $productController = new ProductController();
        $productController->deleteProduct();
        break;
    }
    case 'update-product':{
        $productController = new ProductController();
        $productController->updateProduct();
        break;
    }
    case 'update-post-product':{
        $productController = new ProductController();
        $productController->updatePostProduct();
        break;
    }
     // comment
     case 'comment-product':{
        $commentRatingController = new CommentRatingController();
        $commentRatingController->shComment();
        break;
    }
    case 'comment-detail':{
        $commentRatingController = new CommentRatingController();
        $commentRatingController->commentDetail();
        break;
    }
    case 'comment-reply':{
        $commentRatingController = new CommentRatingController();
        $commentRatingController->commentReply();
        break;
    }
    case 'show-order':{
        $orderController = new OrderController();
        $orderController->showOrder();
        break;
    }
    case 'show-order-detail':{
        $orderController = new OrderController();
        $orderController->showOrderDetail();
        break;
    }
    case 'order-change-status':{
        $orderController = new OrderController();
        $orderController->changeStatus();
        break;
    }
    default :{
        $homeController = new HomeController();
        $homeController->dashboard();
        break;
    }
}
}