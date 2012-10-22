<aside class="bg2 padcontent4">
    <div class="container_24">
        <div class="wrapper">
            <div class="grid_24 padRT">
                <?php
                $faq = new pageFormation();
                foreach ($faq->getFAQ() as $key => $value) {
                    echo $value;
                }
                ?>
            </div>
        </div>
    </div>
</aside>