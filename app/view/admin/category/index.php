<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- PAGE CONTENT -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Total category: <?=$categoriesCount?></b></h3>
                        <a href="/admin/category/create" class="btn btn-primary fa-pull-right">
                            Create category
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
                                <th>Posts count</th>
                                <th>Create date</th>
                                <th>Management</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($categories as $category):?>
                                <tr>
                                    <td><?=$category['id']?></td>
                                    <td><?=$category['title']?></td>
                                    <td><?=$category['description']?></td>
                                    <td>0</td>
                                    <td><?=$category['create_date']?></td>
                                    <td>
                                        <a class="btn btn-primary" href="/admin/category/edit?id=<?=$category['id']?>"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-secondary" href="/main/category?id=<?=$category['id']?>"><i class="fas fa-book-open"></i></a>
                                        <a class="btn btn-danger" href="/admin/category/delete?id=<?=$category['id']?>"><i class="fa fa-trash"></i></a>
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