<?php
setcookie("gledao[". htmlspecialchars($_GET["id"]) ."]", '1' , time()+3600);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    require_once "class/baza.php";
    require_once "class/pom.php";
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: grey;
        }
        .opis{
            width: 90%;
            justify-content: right;
            text-align: left;
            border-bottom: solid;
            border-top: solid;
            border-color: black;
        }
        .forma-comentar{
            width: auto;
            border-bottom: solid;
            border-top: solid;
            border-radius: 2px;
            border-color: black;
            padding: 1%;
        }
        .komentari{
            width: 100%;
            border-bottom: solid;
            border-top: solid;
            border-radius: 2px;
            border-color: black;
            padding: 1%;
        }
        .kommO{
            text-align: left;
            
        }
        .kommC{
            text-align: left;
            border-bottom: solid;
            border-radius: 2px;
            border-color: black;
        }
    </style>
</head>
<body>
    <?php Navigation();
    $db=new baza();
    if(!isset($_COOKIE["gledao"][ htmlspecialchars($_GET["id"])])){
        $db->vieved( htmlspecialchars($_GET["id"]));
    }
    if(!empty($_POST["ocena"])){
        $db->uppdateRating( htmlspecialchars($_GET["id"]));
    }
    $video=$db->getVideo( htmlspecialchars($_GET["id"]))[0];
    
    echo "<iframe width=\"90%\" height=\"480\" src=\"".$video["link"] ."?autoplay=1\"></iframe>";
    echo "<table class=opis>";
    echo "<tr> <th>ocena :". number_format((float)$video["rating"], 2, '.', '') ."</tr> </th>";
    echo "<tr> <th>pogledalo :".$video["vievs"] ."</tr> </th>";
    echo "</table>";
    echo "<form  method=post>
    <input type=hidden  name=ocena value=1>
    <input type=submit  value=\"osvezi ocenu\">
    </form>";
?>
    <div class="forma-comentar">
    <form action="" method="post">
    <h4>
            Unesi komentar:
        </h4>
    <label for="ocena"> Ocena :</label>
    <select name="ocena" id="ocena">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            
        </select>
        <br>
        <textarea name="comment" rows="5" cols="66"></textarea>
        <br>
        <input type="submit" >

    </form>
    </div>

    <?php
    if(!empty($_POST["comment"])){
        $db->addComent($video["id"], htmlspecialchars($_POST["comment"]), htmlspecialchars($_POST["ocena"]));
    }
    $comm=$db->getCommentsForVideo($video["id"]);
    echo "<table class=komentari>";
    foreach($comm as $k){
        echo "<tr > <th class=kommO >ocena:".$k["rating"] ." </th> </tr>";
        echo "<tr  > <th class=kommC>".$k["comment"] ."</th> </tr>";
    }
    echo "</table>";
    ?>

    
</body>
</html>