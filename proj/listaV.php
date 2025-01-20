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
     body{background-color: grey;}
    #pretraga{
        margin: 1%;
    }
    table, td, th {  
        border: 3px solid black;
    }
    table {
         table-layout: fixed;
         width: 100%;
         border-collapse: collapse;
    }
    th{
        padding: 5px;
    }
    .pm1{
        width: 5%;
    }
    .link-row:hover { 
        background: red; 
        overflow: hidden;
        list-style-type: none;
    }
    th a{ 
        display: block;
        color: white;
        text-align: center;
        padding: 1%;
        text-decoration: none; 
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
.slbutt:hover{
    background-color: #111;
}
    
    </style>
</head>
<body>
    <?php  Navigation(); ?>
    <form id="pretraga" action="" method="get">
        <input type="text" name="pretraga">
        <input type="submit" value="pronadji">
    </form>

    
    <?php 
    $db=new baza();
    $arr=array();
    $page=1;
    if (!empty($_GET["pretraga"])){
        $arr=$db->getAllVideoWith( htmlspecialchars($_GET["pretraga"]));
    }else{
        $arr=$db->getAllVideo();
    }
    if (!empty($_GET["page"])){
        $page= htmlspecialchars($_GET["page"]);
    }
    echo "<table >
         <tr>
            <th class=pm1>No:</th>
            <th>ime</th>
            <th class=pm1>ocena</th>
            <th class=pm1>pregledi</th>
        </tr>
        
    ";
    for($i=10*$page-10;$i<($page*10);$i++){
        if(!empty($arr[$i])){
        echo "
        <tr class=link-row>
            <th ><a href=http://localhost:8888/proj/video.php?id=".$arr[$i]["id"] .">".$i+1 ."</a></th>
            <th ><a href=http://localhost:8888/proj/video.php?id=".$arr[$i]["id"] .">".$arr[$i]["name"] ."</a></th>
            <th ><a href=http://localhost:8888/proj/video.php?id=".$arr[$i]["id"] .">".number_format((float)$arr[$i]["rating"], 2, '.', '') ."</a></th>
            <th ><a href=http://localhost:8888/proj/video.php?id=".$arr[$i]["id"] .">".$arr[$i]["vievs"] ."</a></th>
        </tr>";
        }
    }
    echo "</table>";
    echo"<div class=slider>";
    if(!empty($_GET["pretraga"])){
        if($page>1){
    echo "<a href=http://localhost:8888/proj/listaV.php?pretraga=".htmlspecialchars($_GET["pretraga"])."&page=".$page-1 ."><button class=slbutt>nazad</button> </a>";
        }
        if(count($arr)>$page*10){
    echo "<a href=http://localhost:8888/proj/listaV.php?pretraga=".htmlspecialchars($_GET["pretraga"])."&page=".$page+1 ."><button class=slbutt>napred</button> </a>";
        }
    }else{
        if($page>1){
        echo "<a href=http://localhost:8888/proj/listaV.php?page=".$page-1 ."><button class=slbutt>nazad</button> </a>";
        }
        if(count($arr)>$page*10){
        echo "<a href=http://localhost:8888/proj/listaV.php?page=".$page+1 ."><button class=slbutt>napred</button> </a>";
        }
    }
    echo "</div>";



    
    ?>
    
</body>
</html>