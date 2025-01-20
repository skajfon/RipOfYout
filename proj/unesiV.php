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
            background-color: gray  ;
        }
        form{
             margin: 0.5%;
             padding: 0.5%;
             text-align: center;
             display: inline-block;
             border: 2px solid black;
             width: 40%;
        }
        input{
            text-align: center;
            margin: 1%;
            width: 80%;
            height: 30px;
        }
        #form{
            width: 98%;
            margin: 1%;
            text-align: center;
        }
    </style>

</head>
<body> 
    <?php Navigation(); ?>
    <div id="form">
    <form action="" method="post">
        <br>
    <label for="name">Ime videa:</label><br>
    <input id="name" type="text" maxlength="50" name="name"/>
        <br>
    <label for="link">Link:</label><br>
    <input id="link" type="text" maxlength="255" name="link"/>
        <br>
    <input id="butt" type="submit" value="Unesi video"/>
    </form>
    </div>
    <?php
    if(!empty($_POST["name"])&& !empty($_POST["link"])){
        $db=new baza();
        $uspeli=$db->AddVideo(htmlspecialchars($_POST["link"]),htmlspecialchars($_POST["name"]));
        if($uspeli){
            echo "<div id=form><h3>video je dodat</h3> </div>";
        }else{
            echo "<div id=form><h3>video nije dodat</h3> </div>";
        }

    }
    
    ?>
</body>
</html>