<section class="content">
    <div class="container-fluid">
        <!-- PAGE CONTENT -->
            <div class="row">
                <div class="container-fluid">
                    <h3>Update user</h3>
                    <form action="/admin/users/update" method="POST">
                        <div class="form-group">
                            <label for="login">Login</label>
                            <input type="text" name="login" class="form-control" id="login" value="<?=$user['login']?>" placeholder="Enter login">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="<?=$user['name']?>" placeholder="Enter user name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" value="<?=$user['email']?>" placeholder="Enter email">
                        </div>
                        <div class="form-check">
                            <?php if($user['role']=='admin'):?>
                                <input type="checkbox" checked name="role" class="form-check-input" id="user-role">
                            <?php else:?>
                                <input type="checkbox" name="role" class="form-check-input" id="user-role">
                            <?php endif?>
                            <label class="form-check-label" for="user-role">Admin</label>
                            <input type="hidden" name="id" value="<?=$user['id']?>">
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button type="submit" name="update" class="btn btn-primary">Update user</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>