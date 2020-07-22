<?php include("config/database.php"); ?>

<?php include("views/header.php"); ?>

<body>

<?php include("views/navigation.php"); ?>

<!-- Main -->
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
        <?php if(isset($_SESSION['message_alert'])):  ?>
            <div class="alert alert-<?= $_SESSION['color_alert']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message_alert'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php session_destroy(); endif; ?>

            <div class="card card-body">
            <!-- Form -->
                <form action="core/create.php" method="post">
                    <label for="fullname">Username</label>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" name="fullname" id="fullname" autofocus class="form-control" placeholder="Enter your username"> 
                        </div> 
                    </div>
                    <label for="description">Description</label>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
                            </div>
                            <textarea name="description" id="description" class="form-control" rows="2" placeholder="Enter your description"></textarea>
                        </div>
                    </div> 
                    <input type="submit" value="Save" name="save_info" class="btn btn-success btn-block">
                </form> 
                <!-- End Form -->
            </div> 
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Full Name</th> 
                        <th>Description</th> 
                        <th>Created At</th> 
                        <th>Actions</th> 
                    </tr> 
                </thead> 
                <tbody>
                    <?php
                        $query = "SELECT * FROM info"; 
                        $response = $connection->query($query);
                           
                        while($row = $response->fetch_assoc()):?>
                            <tr>
                                <td><?php echo $row['name'] ?></td> 
                                <td><?php echo $row['description'] ?></td> 
                                <td><?php echo $row['created_at'] ?></td> 
                                <td>
                                    <a href="core/edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">
                                        <i class="fas fa-edit text-white"></i>
                                    </a>
                                    <a href="core/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
                                        <i class="fas fa-trash-alt text-white"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; 
                    ?>
                </tbody>
            </table> 
        </div>
    </div>
</div>

</body>
</html>