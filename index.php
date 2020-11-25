<?php

include_once("config.php");
 

$result = mysqli_query($mysqli, "SELECT * FROM emp");
?>
 
<html>
<head>    
    <title>Pagrindinis</title>
    <style type="text/css">
        .odd{
            background-color: lightgrey;
        }
        .even{
            background-color: white;
        }
    </style>
</head>

<body>
    <a href="add.html">Prideti nauja darbuotoja</a><br/><br/>
 
    <table width='80%' border=0>
        <tr bgcolor='lightpink'>
            <td>Darbuotojo Numeris</td>
            <td>Vardas</td>
            <td>Alga</td>
            <td>Veiksmai</td>
        </tr>
        <?php 
            $i = 0;
        while($res = mysqli_fetch_array($result)) {         
            if($i % 2 != 0){
                $classes = "odd";
            }
            else{
                $classes = "even";
            }
            echo "<tr class=".$classes.">";
            echo "<td>".$res['empno']."</td>";
            echo "<td>".$res['empname']."</td>";
            echo "<td>".$res['sal']."</td>";    
            echo "<td><a href=\"update.php?id=$res[empno]\">Redaguoti</a> | <a href=\"delete.php?id=$res[empno]\" onClick=\"return confirm('Ar tikrai norite istrinti si irasa?')\">Ištrinti</a></td>";
            $i++;
        }
        ?>
    </table>
</body>
</html>
