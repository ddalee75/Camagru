<?php
require_once('./classes/dbh.classes.php');
class ShootManage extends Dbh
{
    public function showShoot($userid)
    {

        if(isset($_GET['page']) && !empty($_GET['page'])){
            $currentPage = (int) strip_tags($_GET['page']);
        }else{
            $currentPage = 1;
        }

    $sql = 'SELECT idGallery FROM gallery WHERE users_id=? ';
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$userid]);
    $row = $stmt->rowCount();
    $nbArticles = (int) $row;
    
    $parPage=6;
    $pages = ceil($nbArticles / $parPage);

    // Calcul du 1er article de la page
    $premier = ($currentPage * $parPage) - $parPage;


    // print_r($nbArticles);
    // print_r(- $pages);
    // print_r(- $premier);

        
    $sql= "SELECT * FROM gallery  WHERE users_id = '$userid' ORDER BY `gallery`.`idGallery` DESC LIMIT :premier, :parpage;" ;
    
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':premier', $premier, PDO::PARAM_INT);
    $stmt->bindValue(':parpage', $parPage, PDO::PARAM_INT);
    $stmt->execute();
 

    echo '<div class="img_bloc_shoot_env">';
    while($row =$stmt->fetch())
    {
        echo '
        <div class="img_bloc_Shoot">
        <a class="txt_color" href="../index.php?url=image&idGallery='.$row["idGallery"].'">
       
        <div class="photo_Shoot" style="background-image: url('.$row["path"].');"></div>
        <h3>'.$row["nameGiven"].'</h3>
        </a>
        </div>
        ';


    }
    ?>
    </div> <!-- fin de img_bloc_shoot_env -->
    <nav class ="show_shoot_img">
        <ul class="pagination">
            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                <a href="../index.php?url=camera&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
            </li>
            <?php for($page = 1; $page <= $pages; $page++): ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                    <a href="../index.php?url=camera&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endfor ?>
                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                <a href="../index.php?url=camera&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
            </li>
        </ul>
    </nav>
      

    



<?php
    }//fin de function
}//fin de class


 

?>