<?php

include "connection.php";

$id=$_GET['id'];
$sql="SELECT * FROM TASKS WHERE `TASKS`.`id`=$id";
$result=mysqli_query($conn, $sql);
$rows=mysqli_fetch_assoc($result);

?>

<!doctype html>
<html lang="en">
    <head>
        <title>Update Tasks</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <div class="container border border-2 border-dark rounded my-3 p-2" style ="max-width:600px">
                <form action="update.php?id=<?php echo "{$rows['id']}";?>" method="post">
                    <h1 class="text-center">Update Task</h1><br>
                    <div class="mb-2">
                        <!-- <label for="" class="form-label">Id</label> -->
                        <input
                            type="hidden"
                            
                            name="id"
                            id=""
                            value="<?php echo"{$rows['id']}";?>"
                        />
                    </div>
                    <div class="mb-4">
                        <label for="" class="form-label">Title</label>
                        <input
                            type="text"
                            class="form-control"
                            name="title"
                            id=""
                            aria-describedby="helpId"
                            placeholder="Title"
                            required
                            value="<?php echo"{$rows['title']}";?>"
                        />
                    </div>
                    <div class="mb-4">
                        <label for="" class="form-label">Description</label>
                        <input
                            type="text"
                            class="form-control"
                            name="desc"
                            id=""
                            aria-describedby="helpId"
                            placeholder="Description"
                            maxlength="500"
                            required
                            value="<?php echo"{$rows['description']}";?>"
                        />
                        <br>
                        <div class="mb-4">
                            <label for="" class="form-label">Status</label>
                            <select
                                class="form-select form-select-sm"
                                name="status"
                                id="">
                                <option value="Pending" <?php echo $rows['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                <option value="In Progress" <?php echo $rows['status'] == 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
                                <option value="Completed" <?php echo $rows['status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>

                            </select>
                        </div>
                        
                        
                        <button
                        type="submit"
                        class="btn btn-primary mt-3"
                    >
                        Update Task
                    </button>
                    </div>
                    
                </form>
            </div>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
