<?php
class evenement {
    public int $id;
    public string $titre_e;
    public string $image_e;
    public string $description_e;
    public string $date_e;

    function __construct(
        int $id=-1
        , string $titre_e=""
        , string $image_e=""
        , string $description_e=""
        , string $date_e=""
    ) {
        $this->id= $id;
        $this->titre_e = $titre_e;
        $this->image_e = $image_e;
        $this->description_e=$description_e;
        $this->date_e=$date_e;
    }
    
    static function convertRawToEvent($dbData) {
        if($dbData) {
            return new evenement(
                $dbData['id_e']
                , $dbData['titre_e']
                , $dbData ['image_e']
                , $dbData['description_e']
                , $dbData['date_e']
            );
        } else {
            return new evenement();
        }
    }
    static function convertRawToEventf($dbData) {
        if($dbData) {
            return new evenement(
                $dbData['id_e']
                  ,$dbData['titre_e']
                , $dbData ['image_e']
                , $dbData['description_e']
                , $dbData['date_e']
            );
        } else {
            return new evenement();
        }
    }
    
    function formatRow() {
        $id=$this->id;
        $titre_e=$this->titre_e;
        $image_e=$this->image_e;
        $description_e = $this->description_e;
        $date_e =$this->date_e;
        return "
            <tr>
                <td>$id</td>
                <td>$titre_e</td>
                <td><a><img class='' src=$image_e style='width: 300px; height:200px;'></a></td>
                <td>$description_e</td>
                <td>$date_e</td>
                <td>
                    <a href='FormUpdate.php?id_e=$id' class='btn btn-success btn-sm'>Edit</a>
                    <a href='delete.php?id_e=$id' class='btn btn-danger btn-sm'>Delete</a>

                </td>
            </tr>
        ";

    }

    function formatRoww() {
        $id=$this->id;
        $titre_e=$this->titre_e;
        $image_e=$this->image_e;
        $description_e = $this->description_e;
        $date_e =$this->date_e;
        return "
        <tr>
        <td>$titre_e</td>
        <td><a><img class='' src=$image_e style='width: 100px; height:100px;'></a></td>
        <td>$date_e</td>
        <td>
            <a href='read.php?id_e=$id' class='btn btn-info btn-sm'>View</a>
            <a href='addr.php?id_e=$id'  class='btn btn-info btn-sm'>Créer Reclamation</a>

        </td>
            </tr>
        ";

    }

}