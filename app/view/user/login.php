
<div class="container mt-5">
    <div class="container">
        <form method="post" action="/user/login" id="login-form">
            <div class="mb-3 input-control">
                <label for="login" class="form-label">Login:</label>
                <input type="text" name="login" class="form-control form-input" id="login">
                <small id="error"></small>
            </div>
            <div class="mb-3 input-control">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control form-input">
                </div>
                <small id="error"></small>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>
</div>
