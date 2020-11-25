<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $empno = $_POST['empno'];
    $name = $_POST['name'];
    $sal = $_POST['salary'];
        
    // checking empty fields
    if(empty($empno) || empty($name) || empty($sal)) {                
        if(empty($empno)) {
            echo "<font color='red'>Laukelis 'Darbuotojo Numeris' yra privalomas.</font><br/>";
        }

        if(empty($name)) {
            echo "<font color='red'>Laukelis 'Vardas' yra privalomas.</font><br/>";
        }
        
        if(empty($sal)) {
            echo "<font color='red'>Laukelis 'Alga' yra privalomas.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Gryzti Atgal</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO emp(empno,empname,sal) VALUES('$empno','$name','$sal')");
        
        //display success message
        echo "<font color='green'>Irasas issaugotas sekmingai.";
        echo "<br/><a href='index.php'>Perziureti rezultata</a>";
    }
}
?>
</body>
</html>
