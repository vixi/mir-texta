<table class="table table-hover">
    <tr>
        <th>Пользователь</th>
        <th>Заголовок статьи</th>
        <th>Тематика</th>
        <th>Вид статьи</th>
        <th>Символов</th>
        <th>Стоимость</th>
        <th>Уникальность</th>
        <th>Дата</th>
        <th>Статус</th>
    </tr>
    <?php
    $admin_controller = new AdminController();
    $admin_controller->getController($_GET[action]);
    ?>
</table>