<?php
class baza{
    private $conn;
    public function __construct() {
     
             $dsn = "mysql:host=localhost;dbname=poject";
             $username = "root";
             $password = "";
             $this->conn = new PDO( $dsn, $username, $password );
             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        public function getAllVideo() {
	    	$result = array();
	    	$sql = "SELECT * FROM video ";
	    	try {
				$query_result = $this->conn->query($sql);
				foreach ($query_result as $q) {
					$result[] = $q;
				}
	    	} catch (PDOException $e) {
			}
			return $result;
	    }
        public function getAllVideoWith($word) {
	    	$result = array();
	    	$sql = "SELECT * FROM video WHERE name LIKE '%$word%' ";
	    	try {
				$query_result = $this->conn->query($sql);
				foreach ($query_result as $q) {
					$result[] = $q;
				}
	    	} catch (PDOException $e) {
			}
			return $result;
	    }
		public function getVideo($id) {
	    	$result = array();
	    	$sql = "SELECT * FROM video WHERE id=$id ";
	    	try {
				$query_result = $this->conn->query($sql);
				foreach ($query_result as $q) {
					$result[] = $q;
				}
	    	} catch (PDOException $e) {
			}
			return $result;
	    }

        public function AddVideo($link,$name) {
	    	$sql = "INSERT INTO video (id,link, rating, vievs, name ) VALUES (NULL,:link,:rating,:viev,:name); ";
	    	try {
				$st = $this->conn->prepare($sql);
				$st->bindValue(":link", $link);
				$st->bindValue(":rating", 1.0);
				$st->bindValue(":viev", 0);
                $st->bindValue(":name", $name);
				$st->execute();
	    	} catch (PDOException $e) {
                return false;
			}
			return true;
	    }
        public function vieved($id) {
	    	$sql = "UPDATE video SET vievs = vievs + 1 WHERE id = ".$id .";";
	    
	    	try {
				$st = $this->conn->query($sql);
	    	} catch (PDOException $e) {
                return false;
			}
			return true;
	    }
        public function addComent($idV,$comment,$rating) {
	        $sql = "INSERT INTO comment (id, idvideo, comment, rating) VALUES (NULL,:idV,:comment,:rating); ";
	    	try {
				$st = $this->conn->prepare($sql);
				$st->bindValue(":idV", $idV);
				$st->bindValue(":comment", $comment);
				$st->bindValue(":rating",$rating );
				$st->execute();
	    	} catch (PDOException $e) {
                return false;
			}
			return true;
	    }
        public function getCommentsForVideo($idV) {
	    	$result = array();
	    	$sql = "SELECT * FROM comment where idvideo = ".$idV;
	    	try {
				$query_result = $this->conn->query($sql);
				foreach ($query_result as $q) {
					$result[] = $q;
				}
	    	} catch (PDOException $e) {
			}
			return $result;
	    }
        public function uppdateRating($idV) {
	    	$pom = array();
	    	$pom = $this->getCommentsForVideo($idV);
            $sum=0;
            $num=0;
            foreach($pom as $p){
                $num++;
                $sum=$sum+$p["rating"];
            }
            if($sum>0){
                $ratin=((float)$sum)/((float)$num);
                $sql = "UPDATE video SET rating=$ratin WHERE id = ".$idV .";";
	    
	    	try {
				$st = $this->conn->query($sql);
	    	} catch (PDOException $e) {
			}

            }
	    }
        public function getAllPictire() {
	    	$result = array();
	    	$sql = "SELECT * FROM slika ";
	    	try {
				$query_result = $this->conn->query($sql);
				foreach ($query_result as $q) {
					$result[] = $q;
				}
	    	} catch (PDOException $e) {
			}
			return $result;
	    }
        public function AddPicture($name,$lokacija) {
	    	$sql = "INSERT INTO slika (id,name, lokacija, likes) VALUES (NULL,:name,:lokacija,:like); ";
	    	try {
				$st = $this->conn->prepare($sql);
				$st->bindValue(":name", $name);
				$st->bindValue(":lokacija", $lokacija);
				$st->bindValue(":like", 0);
				$st->execute();
	    	} catch (PDOException $e) {
                return false;
			}
			return true;
	    }
		public function DeletePicture($lokacija) {
	    	$sql = "DELETE FROM slika WHERE lokacija=$lokacija";
	    	try {
				$st = $this->conn->query($sql);
	    	} catch (PDOException $e) {
                return false;
			}
			return true;
	    }
		public function liked($id) {
	    	$sql = "UPDATE slika SET likes = likes + 1 WHERE id = ".$id .";";
	    	try {
				$st = $this->conn->query($sql);
	    	} catch (PDOException $e) {
                return false;
			}
			return true;
	    }

}


?>