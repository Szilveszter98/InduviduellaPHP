<?php

include("../../config/database_handler.php");

class Posts {
    private $database_handler;
    private $post_id;

    public function __construct( $database_handler_IN ) {

        $this->database_handler = $database_handler_IN;

    }

    public function setPostId($post_id_IN) {

        $this->post_id = $post_id_IN;

    }
    public function fetchSinglePost() {

        $query_string = "SELECT id, title, content, price, date_posted FROM posts WHERE id=:post_id";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {
            
            $statementHandler->bindParam(":post_id", $this->post_id);
            $statementHandler->execute();

            return $statementHandler->fetch();



        } else {
            echo "Could not create database statement!";
            die();
        }
    }

    

    public function fetchAllPosts() {

        $query_string = "SELECT id, title, content, price, date_posted FROM posts";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->execute();
            return $statementHandler->fetchAll();

        } else {
            echo "Could not create database statement!";
            die();
        }
        
    }

    public function addPost($title_param, $content_param, $price_param) {

        $query_string = "INSERT INTO posts (title, content, price) VALUES(:title_IN, :content_IN, :price_IN )";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":title_IN", $title_param);
            $statementHandler->bindParam(":content_IN", $content_param);
            $statementHandler->bindParam(":price_IN", $price_param);
            $success = $statementHandler->execute();

            if($success === true) {
                echo "New product has been created!";
                echo "<a href='../../index.php'> Back to the login site </a>";
            } else {
                echo "Error while trying to insert post to database!";
            }

        } else {
            echo "Could not create database statement!";
            die();
        }
    }



    public function updatePost($data) {


        print_r($data);

        if(!empty($data['title'])) {
            $query_string = "UPDATE posts SET title=:title WHERE id=:post_id";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":title", $data['title']);
            $statementHandler->bindParam(":post_id", $data['id']);

            $statementHandler->execute();
            
        }

        if(!empty($data['content'])) {
            $query_string = "UPDATE posts SET content=:content WHERE id=:post_id";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":content", $data['content']);
            $statementHandler->bindParam(":post_id", $data['id']);

            $statementHandler->execute();
            
        }

        if(!empty($data['price'])) {
        $query_string = "UPDATE posts SET price=:price WHERE id=:post_id";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":price", $data['price']);
            $statementHandler->bindParam(":post_id", $data['id']);

            $statementHandler->execute();
            
        }

        $query_string = "SELECT id, title, content, date_posted, user_id FROM posts WHERE id=:post_id";
        $statementHandler = $this->database_handler->prepare($query_string);

        $statementHandler->bindParam(":post_id", $data['id']);
        $statementHandler->execute();

        echo json_encode($statementHandler->fetch());
         
        


    }

    public function deletePost($postID) {

        $query_string = "Delete FROM posts WHERE id=:postID";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":postID", $postID);
        
            $success = $statementHandler->execute();

            if($success === true) {
                echo "$postID has been deleted!";
                echo "<a href='../../index.php>Back to the index</a>";
            } else {
                echo "Error while trying to insert post to database!";
            }

        } else {
            echo "Could not create database statement!";
            die();
        }
    }

}


?>