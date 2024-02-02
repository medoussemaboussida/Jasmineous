<?php
include '../../config.php';
include '../../Model/User.php';

class UserC
{
    public function listUsers()
    {
        $sql = "SELECT * FROM user_hub";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteUser($id)
    {
        $sql = "DELETE FROM user_hub WHERE id= :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addUser($user)
    {
        $sql = "INSERT INTO user_hub  
        VALUES (NULL, :n,:e, :p,:ut)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'n' => $user->getname(),
                'e' => $user->getemail(),
                'p' => $user->getpassword(),
                'ut' => $user->getuser_type()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updateUser($user, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user_hub SET 
                    name = :name, 
                    email = :email, 
                    password = :password, 
                    user_type = :user_type
                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'name' => $user->getname(),
                'email' => $user->getemail(),
                'password' => $user->getpassword(),
                'user_type' => $user->getuser_type()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showUser($id)
    {
        $sql = "SELECT * from user_hub where id= $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function Rechercher($name)
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM user_hub WHERE name LIKE '%$name%' ");
				$query->execute(/*['nom_produit'=>$Nom_Prod]*/);
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
}

