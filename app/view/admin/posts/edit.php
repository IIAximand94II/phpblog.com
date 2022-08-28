<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- PAGE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Edit post
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- FORM -->
                        <form action="/admin/posts/update" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?=$post['title']?>" placeholder="Enter post title">
                            </div>
                            <div class="form-group">
                                <label for="editor">Content</label>
                                <div>
                                    <textarea class="form-control" id="editor" name="content"><?=$post['content']?></textarea>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Title image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="title-img">
                                        <label class="custom-file-label" for="title-img">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category" class="form-label">Select category:</label>
                                <div class="input-group">
                                    <select class="form-select" id="category" name="category_id">
                                        <?php foreach($categories as $category):?>
                                            <?php if($category['id']==$post['category_id']):?>
                                                <option value="<?=$category['id']?>" selected><?=$category['title']?></option>
                                            <?php endif;?>
                                            <option value="<?=$category['id']?>"><?=$category['title']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <fieldset class="tag-field">
                                    <h5>Tags:</h5>
                                    <?php foreach ($postTags as $postTag):?>
                                        <label class="form-label tag" title="<?=$postTag['description']?>"><input checked type="checkbox" name="tag[]" value="<?=$postTag['id']?>"> <?=$postTag['title']?></label>
                                    <?php endforeach;?>
                                    <?php foreach($noPostTags as $noPostTag):?>
                                        <label class="form-label tag" title="<?=$noPostTag['description']?>"><input  type="checkbox" name="tag[]" value="<?=$noPostTag['id']?>"> <?=$noPostTag['title']?></label>
                                    <?php endforeach;?>
                                </fieldset>
                            </div>
                            <div class="form-check">
                                <?php if($post['is_published']=='yes'):?>
                                    <input type="checkbox" checked class="form-check-input" name="is_published" id="is_published">
                                <?php else:?>
                                    <input type="checkbox" class="form-check-input" name="is_published" id="is_published">
                                <?php endif;?>
                                    <label class="form-check-label" for="is_published">Published</label>
                            </div>
                            <input type="hidden" name="id" value="<?=$post['id']?>">
                    </div>

                    <div class="card-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Edit post</button>
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


<!-- tinymce -->
<script src="https://cdn.tiny.cloud/1/0fvm7vib6z76x9zpuzgorgy61228fhrs30cv374tp9fula0p/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#editor',
        height: 500,
        plugins: 'image code fullscreen media preview',
        toolbar: 'undo redo | link image | code | fullscreen | image imagetools | media | preview',
        // enable title field in the Image dialog
        image_title: true,
        // enable automatic uploads of images represented by blob or data URIs
        automatic_uploads: true,
        // add custom filepicker only to Image dialog
        file_picker_types: 'image',
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.onchange = function() {
                var file = this.files[0];
                var reader = new FileReader();

                reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    // call the callback and populate the Title field with the file name
                    cb(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
            };

            input.click();
        }
    });
</script>
