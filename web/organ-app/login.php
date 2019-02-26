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
            <h2>Log In</h2>
            <div class="card">
                <form action="session.php" method="post">
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" />
                    <label for="password">Password</label>
                    <input id="password" type="text" name="password" />
                    <input type="hidden" name="action" value="login" />
                    <input type="submit" value="Log In" />
                    <a href="signUp.php">Sign Up</a>
                </form>
            </div>
        </div>
    </body>
</html>