<?php
require_once "class/pom.php";
require_once "class/baza.php";
$db=new baza();
if(isset($_POST["slika"])&&!isset($_COOKIE["liked"][ htmlspecialchars($_POST["slika"])])){
    $db->liked( htmlspecialchars($_POST["slika"]));
    setcookie("liked[". htmlspecialchars($_POST["slika"])."]", '1' , time()+3600*360);
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
        img{
            max-width: 100%;
        }
        table, th, tr {
            border: solid;
            border-radius: 3px;
            border-color: black;
        }
        th{
            width: 60%;
        }
        .likeA{
            text-align: left;
            
        }
        .likeB{
            margin: 0.4%;
            background: #333;
            width: 200px;
            height: 50px;
            color: white;
        }
        .slider{
            display: flex;
            justify-content: center;
            text-align: center;
        }
        .slbutt{
            margin: 0.4%;
            background: #333;
            width: 200px;
            height: 50px;
            color: white;
        }

    </style>
</head>
<body>
    <?php 
        Navigation();

        $db=new baza();
        $arr=$db->getAllPictire();
        $page=1; 
        if (!empty($_GET["page"])){
            $page= htmlspecialchars($_GET["page"]);
        }       
        echo "<table >
            <tr>
                <th>
                    <h4>slika</h4>
                </th>
                <th>
                    <h4> likovi</h4>
                </th>
            </tr>";
    for($i=10*$page-10;$i<($page*10);$i++){
        if(!empty($arr[$i])){
        echo "
        <tr>
        <th>
        <img src=\"photos/".$arr[$i]["lokacija"]."\" />
        </th>
        <th class=likeA>
        <h3>   Like:".$arr[$i]["likes"] ."</h3>";
                                                            //ovo je komplikovanije nego sto treba kako bi u istoj rundi kad setuje cokie odmah iskljucio like button
            if(!isset($_COOKIE["liked"][$arr[$i]["id"] ])&&!( isset($_POST["slika"]) && ( htmlspecialchars($_POST["slika"])==$arr[$i]["id"] ))){
                echo "
                <form method=post>
                <input type=hidden name=slika value=".$arr[$i]["id"] .">
                <input class=likeB type=submit value=like>
                </form>";
            }else{
                echo "<br>liked";
            }
        echo "</th>
            </tr>";
        }
    }
    echo "</table>";
    echo"<div class=slider>";
    if($page>1){
        echo "<a href=http://localhost:8888/proj/listaS.php?page=".$page-1 ."><button class=slbutt>nazad</button> </a>";
        }
    if(count($arr)>$page*10){
        echo "<a href=http://localhost:8888/proj/listaS.php?page=".$page+1 ."><button class=slbutt>napred</button> </a>";
        }
    echo "</div>";
    ?>

</body>
</html>