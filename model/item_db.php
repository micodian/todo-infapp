<?php
function get_items_by_category($category_id){
    global $db;
    //if $category_id is null INNER JOIN categories ON todoitems.categoryID = categories.categoryID , ORDER BY categoryID
    if($category_id){
        $query = 'SELECT * FROM todoitems
                        INNER JOIN categories ON 
                        todoitems.categoryID=categories.categoryID
                         WHERE todoitems.categoryID= :category_id
                             ';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id',$category_id);
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();                     
    }else{
        $query = 'SELECT * FROM todoitems 
                    INNER JOIN categories ON  
                        todoitems.categoryID=categories.categoryID 
                          ';
        $statement = $db->prepare($query);
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();
    }
    
    return $items;
}

function get_items($itemNum){
    global $db;
    $query = 'SELECT * FROM todoitems
                         WHERE itemNum= :itemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemNum',$itemNum);
    $statement->execute();
    $items = $statement->fetch();
    $statement->closeCursor();
    return $items;
}

function delete_items($itemNum){
    global $db;
    //count to flag item deleted to be returned 
    $query = 'DELETE FROM todoitems
              WHERE itemNum = :itemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemNum', $itemNum);
    $success = $statement->execute();
    $statement->closeCursor(); 
}

function add_items($category_id,$title,$description){
    global $db;
    //count to flag item deleted to be returned 
    if($category_id){
        $query = 'INSERT INTO todoitems
                 (categoryID, Title, Description)
              VALUES
                 (:category_id, :title, :description)';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->execute();
        $statement->closeCursor(); 
    }else{
        $query = 'INSERT INTO todoitems
                 (Title, Description)
              VALUES
                 (:title, :description)';
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->execute();
        $statement->closeCursor();
    }
     
}

?>