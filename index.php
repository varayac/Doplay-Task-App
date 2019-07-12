<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<!-- Modal New Task-->
    <div class="modal fade" id="newTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="card">
            <div class="card-body">
                <!-- FORMULARIO NUEVA TAREA -->
                <form class="task-form" action="save_task.php" method="POST">
                    <!-- Input Name Owner -->
                    <div class="form-group">
                        <input type="text" name="owner" placeholder="Owner" class="form-control">
                    </div>
                    <!-- Textarea Description -->
                    <div class="form-group">
                        <textarea name="name" rows="3" class="form-control" placeholder="Task Name"></textarea>
                    </div>
                    <!-- Button Save -->
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task">
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="container my-4">
        <!-- MENSAJE DATOS INGRESADOS-->
        <?php if(isset($_SESSION['message'])){ ?>
            <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'];?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        <?php session_unset(); } ?>
    </div>

    <!-- TABLA PENDIENTES -->
    <section class="pending mb-4">
        <div class="container pt-4">
            <h2>Pending</h2>
            <table class="table table-bordered table-md">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>OWNER</td>
                        <td>TASK</td>
                        <td>CREATED AT</td>
                        <td>ACTIONS</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM task WHERE category = 1";
                    $result_tasks = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result_tasks)){ ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['owner'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['createdAt'] ?></td>
                            <td>

                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>

                                <a href="archived_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                    <i class="fas fa-file-archive"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
    
    <!-- TABLA EN PROGRESO -->
    <section class="inProgress mb-4">
        <div class="container pt-4">
            <h2>In Progress</h2>
            <table class="table table-bordered table-md">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>OWNER</td>
                        <td>TASK</td>
                        <td>CREATED AT</td>
                        <td>ACTIONS</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT * FROM task WHERE category = 2";
                    $result_tasks = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result_tasks)){ ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['owner'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['createdAt'] ?></td>
                            <td>

                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>

                                <a href="archived_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                    <i class="fas fa-file-archive"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
    
    <!-- TABLA FINALIZADAS -->
    <section class="finish mb-4">
        <div class="container pt-4">
            <h2>Finished</h2>
            <table class="table table-bordered table-md">
                <thead>
                    <tr>
                    <td>ID</td>
                        <td>OWNER</td>
                        <td>TASK</td>
                        <td>CREATED AT</td>
                        <td>ACTIONS</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT * FROM task WHERE category = 3";
                    $result_tasks = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result_tasks)){ ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['owner'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['createdAt'] ?></td>
                            <td>

                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>

                                <a href="archived_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                    <i class="fas fa-file-archive"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
    

<?php include("includes/footer.php") ?>