<div class="span8">
<?php
    $admin_controller = new AdminController();
    $admin_controller->getController($_GET[action]);
    $admin_controller->postController($_POST[submit],$_POST[theme_id]);
?>
</div>