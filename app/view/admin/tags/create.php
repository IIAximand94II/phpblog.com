<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- PAGE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Create tag
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- FORM -->
                        <form action="/admin/tags/store" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter tag title">
                            </div>
                            <div class="form-group">
                                <label for="editor">Description</label>
                                <div>
                                    <textarea class="form-control" id="editor" name="description"></textarea>
                                </div>
                            </div>
                    </div>

                    <div class="card-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Create tag</button>
                        </form>
                        <!-- END FORM -->
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
    </div>
    </div>
</section>
