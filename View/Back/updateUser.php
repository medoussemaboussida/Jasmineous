<?php

include '../../Controller/UserC.php';

$error = "";

// create client
$user = null;

// create an instance of the controller
$userC = new UserC();
if (
    isset($_POST["id"]) &&
    isset($_POST["name"]) &&
    isset($_POST["email"]) &&
    isset($_POST["password"]) &&
    isset($_POST["user_type"])
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST['name']) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["user_type"])
    ) {
        $user = new User(
            $_POST['id'],
            $_POST['name'],
            $_POST['email'],
            $_POST['password'],
            $_POST['user_type']
        );
        $userC->updateUser($user, $_POST["id"]);
        header('Location:ListUsers.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="ListUsers.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $user = $userC->showUser($_POST['id']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id">Id:
                        </label>
                    </td>
                    <td><input type="text" name="id" id="id" value="<?php echo $user['id']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="name">Name:
                        </label>
                    </td>
                    <td><input type="text" name="name" id="name" value="<?php echo $user['name']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email:
                        </label>
                    </td>
                    <td><input type="text" name="email" id="email" value="<?php echo $user['email']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="password">:
                        </label>
                    </td>
                    <td>
                        <input type="password" name="password" value="<?php echo $user['password']; ?>" id="password">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="user_type">Type d'utilisateur:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="user_type" id="user_type" value="<?php echo $user['user_type']; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>