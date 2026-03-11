<?php
require 'functions.php';
require 'students.php';



if (isset($_POST['submit'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $course = $_POST['course'];
    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d h:i:s");

    cleanInput($firstName);
    cleanInput($lastName);
    cleanInput($email);
}

for ($i = 0; $i < count($students); $i++) {
    if ($email == $students[$i][2]) {
        echo "<script>alert('The email inputted is already existed'); window.location.href='index.php'</script> ";
    }
}


echo validateEmail($email)
    ? "<script>alert('Registration is Successful')</script> "
    : "<script>alert('Incorrect Email Input'); window.location.href='index.php'</script> ";

$age = calculateAge($birthday);

$students[] = [$firstName, $lastName, strtolower($email), $birthday, $course, $date];

// Sorting
$arrLength = count($students);
for ($i = 0; $i < $arrLength - 1; $i++) {
    for ($j = 0; $j < $arrLength - $i - 1; $j++) {
        if (strtolower($students[$j][0]) < strtolower($students[$j + 1][0])) {
            $temp = $students[$j];
            $students[$j] = $students[$j + 1];
            $students[$j + 1] = $temp;
        }
    }
}

?>

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
    <div class="container mt-5 pt-5">
        <a class="" href='index.php'">
            << Go Back</a>
    </div>

    <div class=" container m-auto d-flex row justify-content-around">
            <div class="col-lg-4">
                <h5 class="my-3">New Student Added</h5>
                <div class="container-sm bg-success rounded-3 py-2">
                    <h6 class="text-center" style="color: white; font-weight:700;">Details:</h6>
                    <div class="bg-light">
                        <div class="col-md-12 p-2">
                            <b>Full Name: </b>
                            <?php echo ucwords($firstName . " " . $lastName); ?>
                        </div>
                        <div class="col-md-12 p-2">
                            <b>Email: </b>
                            <?php echo strtolower($email); ?>
                        </div>
                        <div class="col-md-12 p-2">
                            <b>Birthday: </b>
                            <?php echo $birthday; ?>
                        </div>
                        <div class="col-md-12 p-2">
                            <b>Age: </b>
                            <?php echo $age; ?>
                        </div>
                        <div class="col-md-12 p-2">
                            <b>Course: </b>
                            <?php echo $course == 'IT' ? 'Information Technology' : 'Computer Science'; ?>
                        </div>
                        <div class="col-md-12 p-2">
                            <b>Registered on: </b>
                            <?php echo $date; ?>
                        </div>
                    </div>

                </div>

                <?php
                echo $age >= 18
                    ? "<h6 class='text-success text-center mt-3'> Qualified! $firstName is Registered </h6>"
                    : "<h6 class='text-danger text-center mt-3'> Not qualified! $firstName is not Registered </h6>";
                ?>
            </div>
            <div class="col-lg-8 mt-3">

                <div class=" d-flex align-items-center m-0">
                    <h1 class="">STUDENTS LISTS</h1>
                    <h5 class="ms-3"> (<b>Total Students:</b>
                        <?php
                        $studentCount = 0;
                        $itCount = 0;
                        $csCount = 0;
                        foreach ($students as $student) {
                            if (calculateAge($student[3]) >= 18) {
                                $stud = true;
                                $studentCount += $stud;
                            }
                        }
                        echo $studentCount; ?>
                        Students)
                    </h5>
                </div>


                <!-- IT DEPARTMENT -->
                <div class=" d-flex align-items-center m-0">
                    <h5>IT DEPARTMENT</h5>
                    <h6 class="ms-3"> (<b>
                            <?php
                            foreach ($students as $student) {
                                if (calculateAge($student[3]) >= 18 && $student[4] == 'IT') {
                                    $stud = true;
                                    $itCount += $stud;
                                }
                            }
                            echo $itCount; ?></b> IT Students)
                    </h6>
                </div>


                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Birthday</th>
                                <th>Age</th>
                                <th>Department</th>
                                <th>Date Registered</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php for ($i = count($students) - 1; $i >= 0; $i--):
                                $studAge = calculateAge($students[$i][3]);
                                if ($studAge > 18 && $students[$i][4] == 'IT'): ?>
                            <tr>
                                <td><?php echo ucwords($students[$i][0] . " " . $students[$i][1]) ?></td>
                                <td><?php echo $students[$i][2]; ?></td>
                                <td><?php echo $students[$i][3]; ?></td>
                                <td><?php echo $studAge  ?></td>
                                <td><?php echo $students[$i][4]; ?></td>
                                <td><?php echo $students[$i][5]; ?></td>
                            </tr>
                            <?php endif;
                            endfor; ?>

                        </tbody>

                    </table>
                </div>


                <!-- CS DEPARTMENT -->
                <div class=" d-flex align-items-center m-0 mt-3">
                    <h5 class="">CS DEPARTMENT</h5>
                    <h6 class="ms-3"> (<b>
                            <?php
                            foreach ($students as $student) {
                                if (calculateAge($student[3]) >= 18 && $student[4] == 'CS') {
                                    $stud = true;
                                    $csCount += $stud;
                                }
                            }
                            echo $csCount; ?></b> CS Students)
                    </h6>
                </div>
                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Birthday</th>
                                <th>Age</th>
                                <th>Department</th>
                                <th>Date Registered</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php for ($i = count($students) - 1; $i >= 0; $i--):
                                $studAge = calculateAge($students[$i][3]);
                                if ($studAge > 18 && $students[$i][4] == 'CS'): ?>
                            <tr>
                                <td><?php echo ucwords($students[$i][0] . " " . $students[$i][1]) ?></td>
                                <td><?php echo $students[$i][2]; ?></td>
                                <td><?php echo $students[$i][3]; ?></td>
                                <td><?php echo $studAge  ?></td>
                                <td><?php echo $students[$i][4]; ?></td>
                                <td><?php echo $students[$i][5]; ?></td>
                            </tr>
                            <?php endif;
                            endfor; ?>

                        </tbody>

                    </table>
                </div>

            </div>







    </div>

</body>

<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>

</html>