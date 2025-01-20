<?php
function Navigation() {
    echo "
             <ul id=pp1>
                <li class=pp2><a href=http://localhost:8888/proj/listaV.php>Lista videa</a></li>
                <li class=pp2><a href=http://localhost:8888/proj/unesiV.php>Unesi video</a></li>
                <li class=pp2><a href=http://localhost:8888/proj/listaS.php>Lista slika</a></li>
                <li class=pp2><a href=http://localhost:8888/proj/unosS.php>Unesi sliku</a></li>
            </ul>";
    echo "
    <style>
    #pp1 {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
      }
      
      .pp2 {
        float: left;
      }
      
      .pp2 a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }
      
      .pp2 a:hover {
        background-color: #111;
      }
    </style>";
  }

?>