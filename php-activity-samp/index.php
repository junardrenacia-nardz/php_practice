<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
        <div class="container-fluid">
            <a href="#" class="navbar-brand" id="">
                <img src="https://plpasig.edu.ph/wp-content/uploads/2023/02/plpsite.png" alt="" width="400">
            </a>
        </div>

    </nav>

    <div class="container-lg mt-5 pt-5">
        <h1 class="text-center mt-4">Student Registration System</h1>

        <form action="process.php" method="POST" class="row needs-validation">
            <div class="col-md-6 mt-2">
                <label for="" class="form-label">First Name</label>
                <input type="text" name="first_name" id="" placeholder="Enter Your First Name" class="form-control"
                    required>
            </div>
            <div class="col-md-6 mt-2">
                <label for="" class="form-label">Last Name</label>
                <input type="text" name="last_name" id="" placeholder="Enter Your Last Name" class="form-control"
                    required>
            </div>

            <div class="col-md-8 mt-2">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" id="" placeholder="sample@email.com" class="form-control" required>
            </div>

            <div class="col-md-4 mt-2">
                <label for="" class="form-label">Birthdate</label>
                <input type="date" name="birthday" id="" class="form-control" required>
            </div>

            <div class="col-md-4 mt-2">
                <label for="" class="form-label">Course</label>
                <select name="course" id="" class="form-select" required>
                    <option value="IT">IT</option>
                    <option value="CS">CS</option>
                </select>
            </div>

            <div class="col-sm-12 mt-5">
                <input type="submit" name="submit" class="btn-success btn form-control" value="Submit">

            </div>
        </form>
    </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>

</html>