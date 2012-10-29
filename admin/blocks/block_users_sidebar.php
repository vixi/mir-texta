<?php
    $admin_formation = new AdminFormation();
    echo "<div class='well' style='float:left; width:180px; overflow: hidden;'>
          <ul class='nav nav-list'>";
    foreach ($admin_formation->getUserList() as $key => $value) {
            echo $value;
    }
    echo "</ul>
          </div>";

?>
