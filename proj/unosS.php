<?php 
    require_once "class/pom.php";
    require_once "class/baza.php";

    function processForm() {
      
        if ( isset( $_FILES["photo"] ) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK ) {
          if ( $_FILES["photo"]["type"] != "image/jpeg" &&  $_FILES["photo"]["type"] != "image/png") {
            echo "<p>Slika mora biti jpg ili png</p>";
          } else {
            
            $db=new baza();
            $dali=$db->AddPicture( htmlspecialchars($_POST["name"]),$_FILES["photo"]["name"]);
            if ($dali) {
              if ( !move_uploaded_file( $_FILES["photo"]["tmp_name"], "photos/" . basename( $_FILES["photo"]["name"] ) ) ) {
                echo "<p>Izvinjavamose doslo je do problema tokom upploda, molimo pokusajte kasnije.</p>" . $_FILES["photo"]["error"] ;
                $db->DeletePicture($_FILES["photo"]["name"]);
                
              }else{
                echo "<div class=formP>";
                echo "<h3>Slika \"".  htmlspecialchars($_POST["name"]) ."\" je uspesno dodana:</h3> ";
                echo "<br>";
                echo "<img src=\"photos/".$_FILES["photo"]["name"]."\" />";
                echo "</div>";
              }
            }else{
              echo "slika vec postoji u bazi, promenite ime fajla i probajte ponovo.";
            }
          }
        } else {
          switch( $_FILES["photo"]["error"] ) {
            case UPLOAD_ERR_INI_SIZE:
              $message = "Slika je bila veca nego sto server dopusta.";
              break;
            case UPLOAD_ERR_FORM_SIZE:
              $message = "Slika je bila veca nego sto je dozvoljeno.";
              break;
            case UPLOAD_ERR_NO_FILE:
              $message = "Nijedan fajl nije odabran.";
              break;
            default:
              $message = "Doslo je do greske pokusajte kasnije.";
          }
          echo $message;
        }
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: grey;
        }
        form{
            margin: 3%;
            background-color: white;
            text-align: left;
            display: inline-block;
            border: 2px solid black;
            width: 27%;

            
        }
        input{
            margin: 10px;
            border: solid;
            border-radius: 2px;
            border-color: black;
        }
        #butt{
            text-align: center;
        }
        .formP{
            margin-left: 5%;
        }
       
    </style>
</head>
<body>
    <?php 
        Navigation();
    ?>
    <div>
    <form  class="fform" action="" method="post" enctype="multipart/form-data">
            <div>
            <input type="hidden" name="MAX_FILE_SIZE" value="250000000000000000" />
            <label for="name">Ime:</label>
            <input type="text" name="name" minlength="3" maxlength="50" />
            </div>
            <label for="photo">Slika:</label>
            <input type="file" name="photo" id="photo" value="" />
            <div id="butt">
                <input type="submit" name="poslana" value="Posalji" />
            </div>
    </form>
    </div >

    <?php 
  
    if( isset( $_FILES["photo"] ) ){
          processForm();
        }
    ?>

</body>
</html>