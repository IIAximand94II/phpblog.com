<article>
    <div class="heading">
        <h2>Login</h2>
    </div>
    <div class="content">
        <form action="/account/login" class="login-form" method="post" enctype="multipart/form-data">
            <div class="form-control">
                <label class="form-label">Login</label><br>
                <input name="login" class="form-input" type="text">

            </div>
            <div class="form-control">
                <label class="form-label">Password</label>
                <input name="password" class="form-input" type="password">
            </div>
            <div class="form-control login-row">
                <button class="btn" type="submit">Submit</button>
            </div>
        </form>
        <div class="form-control end-row">
            <a href="/account/forgotpass">Forgot Password</a>
            <a href="/account/registration">Create new account</a>
        </div>
    </div>
</article>