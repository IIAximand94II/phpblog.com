<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- PAGE CONTENT -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Posts list</b></h3>
                        <!-- modal button-->
                        <a href="/admin/posts/create" class="btn btn-primary fa-pull-right">
                            Create Post
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Published</th>
                                <th>Author</th>
                                <th>Rating</th>
                                <th>Create date</th>
                                <th>Management</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>0</td>
                                <td>For PHP</td>
                                <td>PHP</td>
                                <td>No</td>
                                <td>Admin</td>
                                <td>1</td>
                                <td>11:11 11.11.2011</td>
                                <td>
                                    <a class="btn btn-primary" href=""><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-secondary" href=""><i class="fas fa-book-open"></i></a>
                                    <a class="btn btn-danger" href=""><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php foreach($posts as $post):?>
                            <tr>
                                <td><?=$post['id']?></td>
                                <td><?=$post['title']?></td>
                                <td><?=$post['category_name']?></td>
                                <td><?=$post['is_published']?></td>
                                <td><?=$post['user_id']?></td>
                                <td><?=$post['rating']?></td>
                                <td><?=$post['create_date']?></td>
                                <td>
                                    <a class="btn btn-primary" href="/admin/posts/edit?id=<?=$post['id']?>"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-secondary" href="/main/single?id=<?=$post['id']?>"><i class="fas fa-book-open"></i></a>
                                    <a class="btn btn-danger" href="/admin/posts/delete?delete_id=<?=$post['id']?>"><i class="fa fa-trash"></i></a>
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