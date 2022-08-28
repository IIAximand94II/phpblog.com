
<div class="container mt-5">
    <div class="container">
        <div class="mb-3 text-center">
            <h3>Edit your account details</h3>
        </div>
        <div class="mb-3">
            <span class="message" hidden>Errors</span>
        </div>
        <form method="post" action="/user/registration" id="edit-account">
            <div class="mb-3 input-control">
                <label for="login" class="form-label">Login:</label>
                <input type="text" name="login" class="form-control form-input" id="login">
                <small id="error"></small>
            </div>
            <div class="mb-3 input-control">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control form-input">
                <div id="passwordHelp" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters.
                </div>
                <small id="error"></small>
            </div>
            <div class="mb-3 input-control">
                <label for="confirm-password" class="form-label">Confirm password:</label>
                <input type="password" name="confirmPassword" id="confirm-password" class="form-control form-input">
                <small id="error"></small>
            </div>
            <div class="mb-3 input-control">
                <label for="email" class="form-label">Email address:</label>
                <input type="text" name="email" class="form-control form-input" id="email">
                <small id="error"></small>
            </div>
            <div class="mb-3 input-control">
                <label for="user-name" class="form-label">Name:</label>
                <input type="text" name="name" class="form-control form-input" id="user-name">
                <small id="error"></small>
            </div>
            <div class="mb-3">
                <input type="reset" class="btn btn-secondary">
                <input type="submit" class="btn btn-primary" name="registration" value="Registration">
            </div>
        </form>
    </div>
</div>
