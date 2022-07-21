<?php

class AdminVehiModel extends Driver{

    public function getVehicle(){
        $sql = "SELECT * FROM vehicule";
        $res = $this->getRequest($sql);
        $rows = $res->fetchAll(PDO::FETCH_OBJ);

        //ORM
        $tabVehi = [];

        foreach ($rows as $row) {
            $vehi = new Vehicle();
            $vehi->setId_v($row->id_v);
            $vehi->setMarque($row->marque);
            $vehi->setModele($row->modèle);
            $vehi->setDescription($row->description);
            $vehi->setYear($row->année);
            $vehi->setCountry($row->pays);
            $vehi->setPrice($row->price);
            $vehi->setId_v($row->id_v);
            $vehi->date_created = $row->created;

            array_push($tabVehi,$vehi);
        }
        return $tabVehi;
    }

    // public function insertCategory(Category $cat){
    //     $sql = "INSERT INTO category (nom_cat) Values(:nom)";
    //     $res = $this->getRequest($sql, ['nom'=>$cat->getNom_cat()]);
    //     return $res;
    // }
    // public function deleteCategory(Category $cat){

    //     $sql = "DELETE FROM category WHERE id_cat = :id";
    //     $res = $this->getRequest($sql, ['id'=>$cat->getId_cat()]);
    //     $nb = $res->rowCount();
    //     return $nb;
    // }

    // public function categoryItem(Category $cat){

    //     $sql = "SELECT * FROM category WHERE id_cat = :id";
    //     $res = $this->getRequest($sql, ['id'=>$cat->getId_cat()]);

    //     if($res->rowCount() > 0){
    //         $row = $res->fetch(PDO::FETCH_OBJ);
    //         $cat_edit = new Category();
    //         $cat_edit->setId_cat($row->id_cat);
    //         $cat_edit->setNom_cat($row->nom_cat);

    //         return $cat_edit;
    //     }
    // }
    // public function updateCategory(Category $cat){
    //     $sql = "UPDATE category SET nom_cat = :nom WHERE id_cat = :id";
    //     $res = $this->getRequest($sql, ['nom'=>$cat->getNom_cat(), 'id'=>$cat->getId_cat()]);
    //     return $res;
    // }
}
// $testCat = new Category();
// $testCat->setId_cat(3);
// $acmodel = new AdminCategoryModel();
// $result = $acmodel->categoryItem($testCat);
// var_dump($result);