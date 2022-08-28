<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- PAGE CONTENT -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Users list</b></h3>
                        <!-- modal button-->
                        <button type="button" class="btn btn-primary fa-pull-right" data-toggle="modal" data-target="#modal-lg">
                            Create user
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Login</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Register date</th>
                                <th>Role</th>
                                <th>Verification</th>
                                <th>Management</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($users as $user):?>
                            <tr>
                                <td><?=$user['id']?></td>
                                <td><?=$user['login']?></td>
                                <td><?=$user['name']?></td>
                                <td><?=$user['email']?></td>
                                <td><?=$user['register_date']?></td>
                                <td><?=$user['role']?></td>
                                <?php if($user['verification']==1):?>
                                    <td>Yes</td>
                                <?php else:?>
                                    <td>No</td>
                                <?php endif;?>
                                <td>
                                    <a class="btn btn-primary" href="/admin/users/edit?id=<?=$user['id']?>"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-secondary" href="/admin/users/profile?id=<?=$user['id']?>"><i class="fas fa-address-card"></i></a>
                                    <a class="btn btn-danger" href="/admin/users/delete?delete_id=<?=$user['id']?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <!-- END PAGE CONTENT -->
    </div>
        <!-- /row (main row) -->
    </div>
    <!-- /container-fluid -->
</section>





<!-- MODAL CREATE USER -->
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create user</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- create form -->
                <form action="/admin/users/create" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="login">Login</label>
                            <input type="text" name="login" class="form-control" id="login" placeholder="Enter login">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter user name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm password</label>
                            <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Password">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="role" class="form-check-input" id="user-role">
                            <label class="form-check-label" for="user-role">Admin</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="create" class="btn btn-primary">Create user</button>
                    </div>
                </form><!-- end create form -->
            </div>
        </div>
    </div>
</div>








