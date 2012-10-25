<div class="span8">
        <?php
        $admin_edit = new AdminEdition($alerts_messages);
        switch ($_GET[action]) {
        case 'theme_add' :
            include 'includes/theme_add.php';
            break;
        case 'theme_edit' :
            include 'includes/theme_edit.php';
            break;
        case 'theme_del' :
            include 'includes/theme_del.php';
            break;
        }


        switch ($_POST[submit]) {
        case 'theme_add_submit':
        $admin_edit->themeAdd();
            break;
        case 'theme_edit_submit':
        $admin_edit->themeEdit();
            break;
        case 'theme_del_submit':
        $admin_edit->themeDel();
            break;
        }
        ?>
</div>