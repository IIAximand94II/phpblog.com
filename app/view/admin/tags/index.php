<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- PAGE CONTENT -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Tags list</b></h3><br>
                        <span>Total tags: <?=$tagsCount?></span>
                        <!-- modal button-->
                        <a href="/admin/tags/create" class="btn btn-primary fa-pull-right">
                            Create tag
                        </a>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Create date</th>
                                    <th>Posts count</th>
                                    <th>Management</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($tags as $tag):?>
                                <tr>
                                    <td><?=$tag['id']?></td>
                                    <td><?=$tag['title']?></td>
                                    <td><?=$tag['description']?></td>
                                    <td><?=$tag['create_date']?></td>
                                    <td><?=$tag['posts_count']?></td>
                                    <td>
                                        <a class="btn btn-primary" href="/admin/tags/edit?id=<?=$tag['id']?>"><i class="fa fa-edit" title="Edit tag"></i></a>
                                        <a class="btn btn-secondary" href="/main/tags?id=<?=$tag['id']?>"><i class="fas fa-book-open"></i></a>
                                        <a class="btn btn-danger" href="/admin/tags/delete?id=<?=$tag['id']?>"><i class="fa fa-trash"></i></a>
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