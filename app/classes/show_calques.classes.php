
<?php


        //affiche les calques
        
        //dossier de claque
        $dir = "./common/calques";
            

        //Get all the files in the specified directory
        $files =  array_slice(scandir($dir), 2 );

           

        foreach($files as $file): ?>
            <div class="card">
                <img id=<?=$file ?> onclick="selectCalque(this)" src='<?= $dir . "/" . $file ?>' alt="calque <?= $file ?>" width="92" height="68">
            </div>
        <?php endforeach; ?>




        <!-- ////////////////////////////////////////////////////
        //calculer le nombre de fichier dans le dossier calques
        $nbFiles = glob("$dir/*.*");/* $files pour "lister" les fichiers - Mise en place de *.* pour dire que ce dossier contient une extension (par exemple .jpg, .php, etc... */
        $compteur = count($nbFiles);/* Variable $compteur pour compter (count) les fichiers lister ($nbFiles) dans le dossier */
        // echo "Il y a <font color=#FF0000>$compteur</font>";
        // if ($compteur > 1) { echo " fichiers dans ce répertoire"; }
        // else { echo " fichier dans ce répertoire"; }
        $nbArticles = (int)$compteur; -->
        <!-- print_r($nbArticles); -->