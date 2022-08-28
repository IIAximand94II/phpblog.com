<article>
    <div class="heading">
        <h2>Registration</h2>
    </div>
    <div class="content">
        <form action="/account/registration" id="registration-form" method="post" novalidate enctype="multipart/form-data">

            <!--  ERRORS  -->
            <?php if(!empty($_SESSION['errors'])):?>
                <div class="error-block">
                    <?=$_SESSION['errors'];
                    unset($_SESSION['errors']);?>
                </div>
            <?php endif;?>
            <!--  ERRORS END  -->

            <div class="form-control">
                <label class="form-label">Login</label><br>
                <input id="login" name="login" class="form-input" type="text" required minlength="3">
                <span class="error"></span>
            </div>
            <div class="form-control">
                <label class="form-label">Password</label>
                <input class="form-input" type="password" id="password" name="password" required minlength="8" pattern="(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}">
                <span class="error"></span>
            </div>
            <div class="form-control">
                <label class="form-label">Confirm password</label>
                <input class="form-input" type="password" name="confirmPassword" id="confirm-password" required minlength="8">
                <span class="error"></span>
            </div>
            <div class="form-control">
                <label class="form-label">Email</label>
                <input class="form-input" type="email" name="email" required minlength="6" id="email">
                <span class="error"></span>
            </div>
            <div class="form-control">
                <label class="form-label">Avatar</label>
                <input class="form-input" type="file" name="avatar">
                <span class="error"></span>
            </div>
            <div class="form-control">
                <label class="form-label">Name</label>
                <input class="form-input" type="text" name="name" required minlength="3" id="user-name">
                <span class="error"></span>
            </div>
            <div class="form-control login-row">
                <button class="btn" type="submit">Submit</button>
            </div>
        </form>
    </div>
</article>


