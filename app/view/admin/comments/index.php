<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- PAGE CONTENT -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Total comments: <?=$commentsCount?></b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Post id</th>
                                <th>User id</th>
                                <th>Comment text</th>
                                <th>Create date</th>
                                <th>Management</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($comments as $comment):?>
                                <tr>
                                    <td><?=$comment['id']?></td>
                                    <td><?=$comment['post_id']?></td>
                                    <td><?=$comment['user_id']?></td>
                                    <td><?=$comment['comment']?></td>
                                    <td><?=$comment['create_date']?></td>
                                    <td>
                                        <a class="btn btn-secondary" href="/main/single?id=<?=$comment['post_id']?>"><i class="fas fa-book-open"></i></a>
                                        <a class="btn btn-danger" href="/admin/comments/delete?id=<?=$comment['id']?>"><i class="fa fa-trash"></i></a>
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
    </div>
    </div>
</section>