<aside class="bg2 padcontent4">
    <div class="container_24">
        <div class="wrapper">
            <div class="grid_24 padRT">
                <h3>Все новости</h3>
                <?php
                $news = new pageFormation();
                foreach ($news->getFullNews() as $key => $value) {
                    echo $value;
                }
                ?>
            </div>
        </div>
    </div>
</aside>