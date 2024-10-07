<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example View</title>
</head>
<body>
    <div>
        <h1>Register Account</h1>

        <form action="{{ route('user.register') }}" method="post">
            @csrf
            <label for="username">
                <input type="text" name="username" id="txtUsrname" placeholder="Input your username" required>
            </label>
            </br>
            <label for="firstname">
                <input type="text" name="firstname" id="txtFstname"  placeholder="Input your firstname" required>
            </label>
            </br>
            <label for="lastname">
                <input type="text" name="lastname" id="txtLstname" placeholder="Input your lastname" required>
            </label>
            </br>
            <label for="email">
                <input type="email" name="email" id="txtEmail"  placeholder="Input your email" required>
            </label>
            </br>
            <label for="password">
                <input type="password" name="password" id="txtPassword" placeholder="Input your password" required>
            </label>
            <label for="password_confirm">
                <input type="password" name="password_confirm" id="txtPasswordConfirm" placeholder="Confirm your password">
            </label>

            <label for="submit">
                <input type="submit" value="submit">
            </label>
        </form>
    </div>

</body>
</html>
