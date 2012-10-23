<?php $aside = new pageFormation(); ?>
<aside class="bg2">
    <div class="container_24">
        <div class="wrapper">
            <div class="grid_15 suffix_1">
                <div class="wrapper">
                    <?php echo $aside->getTopNews(); ?>
                </div>

            </div>
            <div class="grid_8 padRT">
                <h3>Наши новости</h3>
                    <?php
                    foreach ($aside->getNews() as $k => $news) {
                        echo $news;
                    }
                    ?>
            </div>
        </div>
    </div>
</aside>