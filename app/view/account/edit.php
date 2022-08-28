<article>
    <div class="heading">
        <h2>Update you profile</h2>
    </div>
    <div class="content">
        <!--      edit  forms    -->
        <form action="/account/updateLogin" class="edit-form" method="post">
            <input type="hidden" name="id" value="<?=$user['id']?>">
            <div class="form-control edit-form">
                <label class="form-label">Login</label><br>
                <div class="edit-form">
                    <input id="login" name="login" class="form-input" type="text" required minlength="3" value="<?=$user['login']?>">
                    <div class="buttons">
                        <button type="submit" class="">Update login</button>
                    </div>
                    <span class="error"></span>
                </div>
            </div>
        </form>

        <form action="/account/updateName" class="" method="post">
            <input type="hidden" name="id" value="<?=$user['id']?>">
            <div class="form-control edit-form">
                <label class="form-label">Name</label><br>
                <div class="edit-form">
                    <input id="login" name="name" class="form-input" type="text" required minlength="3" value="<?=$user['name']?>">
                    <button type="submit" class="edit-button">Update name</button>
                    <span class="error"></span>
                </div>
            </div>
        </form>

        <form action="/account/updateEmail" class="edit-form" method="post">
            <input type="hidden" name="id" value="<?=$user['id']?>">
            <div class="form-control edit-form">
                <label class="form-label">Email</label><br>
                <div class="edit-form">
                    <input class="form-input" type="email" name="email" required minlength="6" id="email" value="<?=$user['email']?>">
                    <div class="buttons">
                        <button type="submit" class="edit-button">Update email</button>
                    </div>
                    <span class="error"></span>
                </div>
            </div>
        </form>

        <form action="/account/updatePassword" class="edit-form" method="post">
            <input type="hidden" name="id" value="<?=$user['id']?>">
            <div class="form-control">
                <label class="form-label">New password</label>
                <input class="form-input" type="password" id="password" name="password" placeholder="Old password" required minlength="8" pattern="(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}">
                <span class="error"></span>
            </div>
            <div class="form-control">
                <input class="form-input" type="password" id="password" name="new_password" placeholder="New password" required minlength="8" pattern="(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}">
                <span class="error"></span>
            </div>
            <div class="form-control">
                <input class="form-input" type="password" id="password" name="confirm_password" placeholder="Confirm new password" id="confirm-password" required minlength="8">
                <span class="error"></span>
                <div class="buttons">
                    <button type="submit" class="edit-button">Update password</button>
                </div>
            </div>
        </form>

        <form action="/account/updateAvatar" class="edit-form" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$user['id']?>">
            <div class="form-control edit-form">
                <label class="form-label">Avatar</label>
                <div class="edit-form">
                    <input class="form-input" type="file" name="new_avatar">
                    <div class="buttons">
                        <button type="submit" class="edit-button">Update avatar</button>
                    </div>
                    <span class="error"></span>
                </div>
            </div>
        </form>
    </div>
</article>