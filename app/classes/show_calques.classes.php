
<?php


        //affiche les calques
        $dir = "./common/calques";
    
        // $result = array();

        //Get all the files in the specified directory
        $files =  array_slice(scandir($dir), 2 );


        foreach($files as $file): ?>
            <div class="card">
                <img id=<?=$file ?> onclick="selectCalque(this)" src='<?= $dir . "/" . $file ?>' alt="calque <?= $file ?>" width="92" height="68">
            </div>
        <?php endforeach; ?>

