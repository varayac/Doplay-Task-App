<?php 

    include("db.php");

    if (isset($_POST['save_task'])){
        $owner = $_POST['owner'];
        $name = $_POST['name'];
        // $category = $_POST['category'];
        $category = 1;
        $isArchived = 0;
        
        $query = "INSERT INTO task(owner, name, category, isArchived) VALUES ('$owner', '$name', $category, $isArchived)";

        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query failed");
        }

        $_SESSION['message']='Task Saved Successfully';
        $_SESSION['message_type']='success';
        header("Location: index.php");
    }

?>