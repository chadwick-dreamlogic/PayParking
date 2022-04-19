<!doctype html>
<html>
<head>
   @include('includes.head')
   <title>Login Page</title>
</head>
    <body>
        <div class="container">
            <div class="header">
                <h1>Login</h1>
            </div>
            <div class="fields">
                <form action="/admin/auth/login" method="post">
                    <div class="form-group">
                        <label id="usernameLabel" for="usernameTextField" class="form-label"> Username
                            <input id="usernameTextField" type="text" name="username" class="form-control" placeholder="username" required>
                        </label>
                    </div>
                    <div class="form-group">
                        <label id="passwordLabel" for="passwordField" class="form-label"> Password
                            <input id="passwordField" type="password" name="password" class="form-control" placeholder="password" required>
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>