<?php
include_once("config.php");

if(isset($_POST['update']))
{
    $id = $_POST['id'];

    $name=$_POST['name'];
    $empid=$_POST['empno'];
    $salary=$_POST['salary'];

    if(empty($name) || empty($empid) || empty($salary)) {
        if(empty($name)) {
            echo "<font color='red'>Laukelis 'Vardas' yra privalomas.</font><br/>";
        }

        if(empty($empid)) {
            echo "<font color='red'>Laukelis 'Darbuotojo Numeris' yra privalomas.</font><br/>";
        }

        if(empty($salary)) {
            echo "<font color='red'>Laukelis 'Alga' yra privalomas.</font><br/>";
        }
    } else {
        $result = mysqli_query($mysqli, "UPDATE emp SET empname='$name',sal='$salary' WHERE empno=$id");
        header("Location: index.php");
    }
}
?>
<?php
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM emp WHERE empno=$id");

while($res = mysqli_fetch_array($result))
{
    $name = $res['empname'];
    $empid = $res['empno'];
    $salary = $res['sal'];
}
?>
<html>
<head>
    <title>Redaguoti</title>
</head>

<body>
<a href="index.php">Pagrindinis</a>
<br/><br/>

<form name="form1" method="post" action="update.php">
    <table border="0">
        <tr>
            <td>Darbuotojo Numeris</td>
            <td><input type="text" name="empno" value="<?php echo $empid;?>"></td>
        </tr>
        <tr>
            <td>Vardas</td>
            <td><input type="text" name="name" value="<?php echo $name;?>"></td>
        </tr>
        <tr>
            <td>Alga</td>
            <td><input type="text" name="salary" value="<?php echo $salary;?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name="update" value="Atnaujinti"></td>
        </tr>
    </table>
</form>
</body>
</html>
