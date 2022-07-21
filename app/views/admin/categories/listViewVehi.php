<?php ob_start(); //var_dump($categories); ?>
<table class="table table-striped text-center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Type</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Description</th>
            <th>Année</th>
            <th>Pays</th>
            <th>Prix</th>
            <th>Disponible</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($categories as $category): ?> 
        <tr>
            <td><?=$category->getId_v();?></td>
            <td>Type ici</td>
            <td><?=ucfirst($category->getMarque());?></td>
            <td><?=ucfirst($category->getModele());?></td>
            <td><?=ucfirst($category->getDescription());?></td>
            <td><?=ucfirst($category->getYear());?></td>
            <td><?=ucfirst($category->getCountry());?></td>
            <td><?=ucfirst($category->getPrice());?></td>
            <td><?=ucfirst($category->getMarque());?></td> 
            <td><?=$category->date_created; ?></td>
            <td>
                <a class="btn btn-success" 
                href="index.php?action=edit_cat&id=<?=$category->getId_v();?>"
                /> <i class="fa fa-edit"></i> Editer</a>
                <!-- Supprimer -->
                <a 
                class="btn btn-danger" 
                href="index.php?action=delete_cat&id=<?=$category->getId_v();?>"
                onclick="return confirm('Etes-vous sûr de supprimer ...')"
                /> <i class="fa fa-trash"></i> Supprimer</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php
$title = "Liste des catégories";
$content = ob_get_clean();
require_once(dirname(dirname(__DIR__)).'/admin/template_back.php');
?>
