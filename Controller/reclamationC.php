<?php
	include_once '../../config.php';
	include_once '../../Model/reclamation.php';
class reclamationController {
    function getAllreclams() {
        $conn = config::getConnexion();
        $sql = "select * from reclamation";
        $request = $conn->prepare($sql);
        $request->execute();
        $result = $request->fetchAll();
        return array_map("reclamation::convertRawToReclam", $result);
    }

    function getReclamById($id_rec) 
    {
        $conn =config::getConnexion();
        $sql = "SELECT * FROM reclamation where id_rec=:id_rec";
        $request = $conn->prepare($sql);
        $request->execute(array("id_rec" => $id_rec));
        $result = $request->fetch();
        return reclamation::convertRawToReclam($result);
    } 



    function updateReclam($id, $desc, $image, $mail_rec)
    {
        $conn = config::getConnexion();
        $sql = "update reclamation set description_rec=:desc, image_rec=:image,mail_rec=:mail_rec where id_rec=:id";
        $request = $conn->prepare($sql);
        $request->execute(array("id" => $id, "desc" => $desc, "image" => $image, "mail_rec" => $mail_rec));
    }

    function deleteReclam($id_rec) {
        $conn = config::getConnexion();
        $sql = "delete from reclamation where id_rec= :id_rec";
        $request = $conn->prepare($sql);
        $request->execute(array("id_rec" => $id_rec));
    }

    function insertReclam($description_rec,$image_rec, $event_rec, $mail_rec) {
        $conn = config::getConnexion();
        $sql = "INSERT INTO reclamation (description_rec,image_rec, event_rec, mail_rec) values (:description_rec,:image_rec,:event_rec,:mail_rec)";
        $request = $conn->prepare($sql);
        $request->execute(array("description_rec" => $description_rec,"image_rec" => $image_rec, "event_rec" => $event_rec, "mail_rec"=>$mail_rec));
    }
}