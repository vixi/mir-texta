<table id="myTable" class="table table-hover">
    <thead>
    <tr>
        <th>Заголовок статьи</th>
        <th>Пользователь</th>
        <th>Тематика</th>
        <th>Вид статьи</th>
        <th>Символов</th>
        <th>Стоимость</th>
        <th>Уникальность</th>
        <th>Дата</th>
        <th>Статус</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $admin_controller = new AdminController();
    $admin_controller->getController($_GET[action]);
    ?>
    </tbody>
</table>
<script language='javascript' type='text/javascript'>
    $(document).ready(function()
        {
            $("#myTable").tablesorter();
        }
    );
</script>