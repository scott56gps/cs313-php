<?php
session_start();

include 'db.php';
$db = getDb();

function generateOptions() {
    for ($i = 1; $i < 11; $i++) {
        echo '<option value="' . $i . '">' . $i . '</option>';
    }
}

$query = "SELECT id, first_name, last_name FROM teacher";
$statement = $db->prepare($query);
$statement->execute();
$teachers = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Organ Practice App - Log In</title>
        <link href="styles.css" rel="stylesheet" />
    </head>

    <body>
        <?php
        include 'sidebar.php';
        ?>
        <div class="main-content">
            <h2>Sign Up</h2>
            <div class="card">
                <form action="session.php" method="post">
                    <label for="firstName">First Name</label>
                    <input id="firstName" type="text" name="studentFirstName" />
                    <label for="lastName">Last Name</label>
                    <input id="lastName" type="text" name="studentLastName" />
                    <label for="email">Email</label>
                    <input id="email" type="text" name="studentEmail" />
                    <select id="teacher-select" name="selectedTeacherId">
                        <?php
                        foreach($teachers as $teacher) {
                            $teacherName = $teacher['first_name'] . ' ' . $teacher['last_name'];
                            $teacherId = $teacher['id'];
                            echo "<option value='$teacherId'>$teacherName</option>";
                        }
                        ?>
                    </select>
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" />
                    <label for="password">Password</label>
                    <input id="password" type="text" name="password" />
                    <input type="hidden" name="login" value="FALSE" />
                    <input type="submit" value="Sign Up" />
                </form>
            </div>
        </div>
    </body>
</html>