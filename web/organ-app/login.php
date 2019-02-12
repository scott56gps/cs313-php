<!DOCTYPE html>
<html>
    <head>
        <title>Organ Practice App - Login</title>
        <link href="styles.css" rel="stylesheet" />
    </head>

    <body>
        <?php
        include 'sidebar.php';
        ?>
        <div class="main-content">
            <h2>Login</h2>
            <div class="card">
                <form action="/session.php" method="get">
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" />
                    <label for="password">Password</label>
                    <input id="password" type="text" name="password" />
                </form>   
            </div>
        </div>
    </body>
</html>