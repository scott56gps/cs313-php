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
                <h3>Log In here Darling!</h3>
                <form action="/session.php" method="get">
                    <input type="submit" name="username" value="Administrator" id="adminLoginButton">Log in as Administrator</input>
                    <input type="submit" name="username" value="Tester" id="testerLogin">Log in as Tester</input>
                </form>   
            </div>
        </div>
    </body>
</html>