<section id="bottom" class="">
    <div class="container bottom"> 
        <div class="row-fluid ">
            <?php
            $footer = Common::model()->find("code = :code", array(":code" => "FOOTER"));
            echo isset($footer) ? $footer->content : "";
            ?>
        </div> 
    </div> 
</section>
</body>
</html>