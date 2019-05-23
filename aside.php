<aside >
  <?php
      $result = get_main_menu($conn);
      if ($result->num_rows > 0) {
       // output data of each row
        while ($row = mysqli_fetch_array($result)) {
          $sub_menu = get_sub_menu($row['id'], $conn);
    ?>
          <h2><?php echo $row['name']; ?></h2>
          <?php if ($sub_menu->num_rows > 0){
                  while ($sub_row = mysqli_fetch_array($sub_menu)){
                  ?>
                      <a href='category.php?id=<?php echo $sub_row['id'];?>'><li><?php echo $sub_row['name']; ?></li></a>
          <?php

                  }

                }
        }
      }

  ?>
</aside>
