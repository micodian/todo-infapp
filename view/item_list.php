<?php include 'header.php';?>

<main>
        <aside>
            <!-- display list of categories -->
            <h2>Categories</h2>
            <nav>
            <ul>
                <?php foreach ($categories as $category) : ?>
                <li><a href="?category_id=<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName'];?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
            </nav>
        </aside>
                    <!-- testing initial page -->
     

       <section>
       <!-- DISPLAY TABLE OF ITEMS -->
       <h2><?php echo $category_name; ?> </h2>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th class="right">Category</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($items as $item) :?>
                
                <tr>
                    <td><?php echo $item['Title'];?></td>
                    <td><?php echo $item['Description'];?></td>
                    <td class="right" ><?php echo $item['categoryName']; ?></td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="delete_item">
                            <input type="hidden" name="itemNum" value="<?php echo $item['itemNum'];?>">
                            <input type="hidden" name="categoryID" value="<?php echo $item['categoryID'];?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>    
            </table>

            <p><a href="?action=show_add_item_form">Add New Item</a></p>
            <p class="last_paragraph"><a href="?action=show_add_category_form">View/Edit Categories</a></p>
       </section> 
    </main>

<?php include 'footer.php'; ?>