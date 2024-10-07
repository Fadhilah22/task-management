<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example View</title>
</head>
<body>
    <div>
        <h1>Login Account</h1>

        <form action="{{ route('user.login') }}" method="post">
            @csrf
            <label for="email_username">
                <input type="text" name="email_username" id="txtEmailUsername"  placeholder="Input your email or username" required>
            </label>
            </br>
            <label for="password">
                <input type="password" name="password" id="txtPassword" placeholder="Input your password" required>
            </label>

            <label for="submit">
                <input type="submit" value="submit">
            </label>
        </form>
    </div>

</body>
</html>
