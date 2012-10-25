<div class="span8">
        <?php
        $admin_edit = new AdminEdition($alerts_messages);
        switch ($_GET[action]) {
        case 'theme_add' :
            include 'includes/theme_add.php';
        }

        switch ($_POST[submit]) {
        case 'theme_add_submit':
        $admin_edit->themeAdd();
            break;
        }
?>
</div>