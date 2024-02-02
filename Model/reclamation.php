<?php
class reclamation {
    public int $id_rec;
    public string $description_rec;
    public string $image_rec;
    public int $event_rec;
    public string $mail_rec;

    function __construct(
        int $id_rec=-1
        , string $description_rec=""
        , string $image_rec=""
        , int $event_rec=-1
        , string $mail_rec=""
    ) {
        $this->id_rec = $id_rec;
        $this->description_rec = $description_rec;
        $this->image_rec=$image_rec;
        $this->event_rec=$event_rec;
        $this->mail_rec=$mail_rec;
        
    }
    static function convertRawToReclam($dbData) {
        if($dbData) {
            return new reclamation(
                $dbData['id_rec']
                , $dbData['description_rec']
                , $dbData['image_rec']
                , $dbData['event_rec']
                , $dbData['mail_rec']
            );
        } else {
            return new reclamation();
        }
    }

    function formatRow() {
        $id_rec=$this->id_rec;
        $description_rec=$this->description_rec;
        $image_rec=$this->image_rec;
        $event_rec=$this->event_rec;
        $mail_rec=$this->mail_rec;
        return "
            <tr>
               
                <td>$description_rec</td>
                <td><a><img class='' src=$image_rec style='width: 100px; height:100px;'></a></td>
                <td>$event_rec</td>
                <td>$mail_rec</td>
                <td>
              
                    <a href='addr.php?id_rec=$id_rec' class='btn btn-dark float-end'>Create Reclamation</a>

                </td>
            </tr>
        ";

    }
    function formatRowb() {
        $id_rec=$this->id_rec;
        $description_rec=$this->description_rec;
        $image_rec=$this->image_rec;
        $event_rec=$this->event_rec;
        $mail_rec=$this->mail_rec;
        return "
            <tr>
                <td>$description_rec</td>
                <td><a><img class='' src=$image_rec style='width: 100px; height:100px;'></a></td>
                <td>$event_rec</td>
                <td>$mail_rec</td>
                <td>
                <a href='deleteREC.php?id_rec=$id_rec' class='btn btn-danger btn-sm'>Delete</a>
                <a href='updateR.php?id_rec=$id_rec' class='btn btn-danger btn-sm'>Update</a>
            </td>
            </tr>
        ";

    }

}