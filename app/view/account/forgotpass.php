<article>
    <div class="heading">
        <h2>Reset password</h2>
    </div>
    <div class="content">
        <form action="/account/findUserForReset" class="reset-pass-form" method="post">
            <div class="form-control">
                <label class="form-label">Enter you email</label><br>
                <input name="email" class="form-input" type="email">
            </div>
            <div class="form-control login-row">
                <button class="btn" type="submit">Submit</button>
            </div>
        </form>
    </div>
</article>
