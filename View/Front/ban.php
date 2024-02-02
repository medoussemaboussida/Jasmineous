<?php 


function check_if_banned($login_attempt = false,$login_success = false)
{

	$limit = 3;

	$string = "mysql:host=localhost;dbname=user_db";
	if(!$con = new PDO($string,'root','')){
		die("could not connect");
	}

	$ip = get_ip();
	
	$query = "select * from banned_table where ip_address = :ip limit 1";
	$stm = $con->prepare($query);
	if($stm){
		$check = $stm->execute([
			'ip'=>$ip,
		]);

		if($check){
			$row = $stm->fetchAll(PDO::FETCH_ASSOC);
			if(is_array($row) && count($row) > 0){
				$row = $row[0];

				$time = time();
				if($row['banned'] > $time){
					//if banned
					header("Location: denied.php");
					die;
				}else{

					if($login_attempt){
					
						if($row['login_count'] >= $limit){

							$query = "update banned_table set banned = :banned, login_count = 0  
							 where id = :id limit 1";

							$expire = ($time + (60 * 1));
							$stm = $con->prepare($query);
							$check = $stm->execute([
									'id'=>$row['id'],
									'banned'=>$expire,
	 							]);
							return;
						}else

						if($login_success){

							//reset login count on success
							$query = "update banned_table set login_count = 0 
							 where id = :id limit 1";

							$stm = $con->prepare($query);
							$check = $stm->execute([
									'id'=>$row['id'],
	 							]);
						}else{

							//add to login count on failure
							$query = "update banned_table set login_count = login_count + 1 
							 where id = :id limit 1";

							$stm = $con->prepare($query);
							$check = $stm->execute([
									'id'=>$row['id'],
	 							]);
						}
					}
				}

				return;

			}
		}
	}

	$login_count = 0;
	$banned = 0;
	$query = "insert into banned_table (ip_address,login_count,banned) 
	values (:ip_address,:login_count,:banned)";

	$stm = $con->prepare($query);
	$check = $stm->execute([
			'ip_address'=>$ip,
			'banned'=>$banned,
			'login_count'=>$login_count,
		]);
}

function get_ip()
{
	$ip = "";

	if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){

		return $_SERVER['HTTP_X_FORWARDED_FOR'];
	}

	if(isset($_SERVER['REMOTE_ADDR'])){

		return $_SERVER['REMOTE_ADDR'];
	}
 
	return $ip;
}