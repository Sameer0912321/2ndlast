
<?php
    include 'conn.php';
    session_start();
?>

<?php
if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM hiring WHERE id = $id";
        $res = mysqli_query($connection,$query);
        if($res){
            header('location:user.php');
        }
    }
    ?>