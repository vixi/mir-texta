<div id="services_block">
    <section class="padcontent2">
        <div class="container_24">
            <div class="wrapper">
                <div class="grid_8 padRT">
                <?php
                $services = new pageFormation();
                echo $services->getServicesFeatures(0);
                ?>
                </div>
                <div class="grid_8 padRT">
                    <?php echo $services->getServicesFeatures(1); ?>
                </div>
                <div class="grid_8 padRT">
                    <?php echo $services->getServicesFeatures(2); ?>
                </div>
            </div>
        </div>
    </div>
    <aside class="bg2 padcontent3">
        <div class="container_24">
            <div class="wrapper">
                <div class="grid_16 suffix_1">
                    <div class="wrapper">
                        <?php echo $services->getTopFeatures(0); ?>
                    </div>
                    <div class="wrapper">
                        <?php echo $services->getTopFeatures(1); ?>
                    </div>
                </div>
                <div class="grid_7 padRT">
                    <h3>Основные услуги</h3>
                </div>
            </div>
        </div>
    </aside>
</div>