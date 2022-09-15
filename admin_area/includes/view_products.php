
<div class="view_product_box">

<h2>View Products</h2>
<div class="border_bottom">

</div><!--/.border_bottom-->

    <form action="" method="post" enctype="multipart/form-data">
        <div class="search_bar">
            <input type="text" id="search" placeholder="Type to search">
        </div>
        <table width="100%">
            <thead>
                <tr>
                    <th><input type="checkbox" id="checkAll">Check</th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Views</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <?php
            global $con;
                $all_products = mysqli_query($con, "select * from products order by product_id DESC ");
                $i = 1;
                while ($row = mysqli_fetch_array($all_products)){

            ?>
            <tbody>
                <tr>
                    <td><input type="checkbox" name="deleteAll[]" value=""></td>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['product_title']; ?></td>
                    <td><?php echo $row['product_price']; ?></td>
                    <td><img src="product_images/<?php echo $row['product_image']?>" width="70" height="50"/></td>
                    <td><?php echo $row['views'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td>
                        <?php
                            if ($row['visible'] == 1) {
                                echo "Approved";
                            } else {
                                echo "Pending";
                            }
                        ?>
                    </td><!--/status-->
                    <td><a href="index.php?action=view_pro&delete_product=<?php echo $row['product_id'];?>">Delete</a></td>
                    <td><a href="index.php?action=edit_pro&product_id=<?php echo $row['product_id'];?>">Edit</a></td>
                </tr>
            </tbody>
            <?php $i++; } ?>

        </table>

    </form>
</div><!--/.view_product_box-->