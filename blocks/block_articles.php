<aside class="bg2 padcontent4">
    <div class="container_24">
        <div class="wrapper">
            <div class="grid_24 padRT">
                <h4>Цены</h4>
                <?php
                $articles = new pageFormation();
                echo "
                <table>
                    <thead>
                        <tr>
                            <th>Тема статьи</th>";
                            foreach($articles->getTypes() as $key => $value) {
                                echo $value;
                            }
                echo "
                        </tr>
                    </thead>
                    <tbody>";
                    foreach($articles->getPriceTable() as $key => $value) {
                                echo $value;
                            }
                echo "
                    </tbody>
                </table>";
                ?>

            </div>
        </div>
    </div>
</aside>