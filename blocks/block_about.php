<aside class="bg2 padcontent2">
    <div class="wrapper">
        <div class="container_24">
            <div class="grid_7 suffix_1">
                    <h3>Наши преимущества</h3>
                    <?php
                    $about = new pageFormation();
                    foreach ($about->getAdvantages() as $key => $value) {
                        echo $value;
                    }
                    ?>
                <!--    <h3 class="padtop4">Что о нас говорят</h3>
                    <?php
                    foreach ($about->getFeedback() as $key => $value) {
                        echo $value;
                    }
                    ?>
                    -->
            </div>
            <div class="grid_16 padRT">
                <div id="padbot3">
                    <h3>Правила размещения статей</h3>
                    <?php
                        echo $about->getMission();
                    ?>
                </div>
            </div>
        </div>
    </div>
</aside>