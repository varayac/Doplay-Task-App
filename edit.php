<?php 
include("db.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        $owner = $row['owner'];
        $name = $row['name'];
    }
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $owner = $_POST['owner'];
    $name = $_POST['name'];
    $category = $_POST['category'];

    $query = "UPDATE task SET owner='$owner', category='$category', name='$name' WHERE id=$id";
    mysqli_query($conn, $query);
    $_SESSION['message']='Task Update Successfully';
    $_SESSION['message_type']='warning';
    header("Location: index.php");
}

?>

<?php include("includes/header.php") ?>                                
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id'] ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="owner" value="<?php echo $owner; ?>" class="form-control" placeholder="Updated Owner">
                    </div>
                    <div class="form-group">
                        <textarea name="name" rows="2" class="form-control" placeholder="Update Task"><?php echo $name ?></textarea>
                    </div>
                    <div class="form-group">
                        <select name="category" class="custom-select custom-select-sm">
                            <option selected value="1">Pending</option>
                            <option value="2">In Progress</option>
                            <option value="3">Finished</option>
                        </select>
                    </div>
                    <button class="btn btn-success" name="update">
                            Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>