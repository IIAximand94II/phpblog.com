<article>
    <div class="heading">
        <h2>Create new password</h2>
    </div>
    <div class="content">
        <form action="/account/createNewPassword" class="login-form" method="post" enctype="multipart/form-data">
            <input type="hidden" name="email" value="<?=$_GET['email']?>"
            <div class="form-control">
                <label class="form-label">New password</label>
                <input type="password" name="password" class="form-input" >
            </div>
            <div class="form-control">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-input" >
            </div>
            <div class="form-control login-row">
                <button class="btn" type="submit">Submit</button>
            </div>
        </form>
    </div>
</article>

