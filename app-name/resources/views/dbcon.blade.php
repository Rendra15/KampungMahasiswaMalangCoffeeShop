<div>
    <?php
        if(DB::connection()->getPdo()){
            echo "Succesfull connect DB".DB::connection()->getDatabaseName();
        }
    ?>
</div>
