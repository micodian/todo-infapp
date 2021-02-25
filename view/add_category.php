<?php include 'header.php';?>
<main>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td>
            <!--deleting category -->
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_category">
                <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>">
                <input type="submit" value="Delete">
            </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table><br><br>
    
    <h2>Add Category</h2>
    <!-- Code for adding category -->
    <!-- after this action, stay on add_category form -->
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_category">    
        <label for="category_name"> Name </label>
            <input type="text" name="category_name" required>
            <input type="submit" value="Add category">
    </form>
    
    

    <br>
    <p><a href="?action=show_item_list">View Todo List</a></p>
    <p class="last_paragraph"><a href="?action=show_add_item_form">Add New Item</a></p>

</main>

<?php include 'footer.php';?>