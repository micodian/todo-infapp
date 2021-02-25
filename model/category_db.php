<?php
//echo nl2br("\ninside category db\n");

function get_categories(){
    global $db;
    $query = 'SELECT * FROM categories
                       ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
    
}

function get_category_name($category_id){
    global $db;
    $query = 'SELECT * FROM categories
                       WHERE categoryID= :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id',$category_id);
    $statement->execute();
    $categories = $statement->fetch();
    $statement->closeCursor();
    $category_name = $category['categoryName'];
    if(!$categoryName){
       $categoryName='None';
    }
    return $category_name;
}

function add_category($category_name){
    global $db;
    //count to flag item deleted to be returned 
    $query = 'INSERT INTO categories
                 (categoryName)
              VALUES
                 (:category_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_name', $category_name);
    $statement->execute();
    $statement->closeCursor();
}

function delete_category($category_id){
    global $db;
    //count to flag item deleted to be returned 
    $query = 'DELETE FROM categories
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $success = $statement->execute();
    $statement->closeCursor();
}


?>