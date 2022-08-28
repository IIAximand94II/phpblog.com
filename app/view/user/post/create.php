<article>
    <div class="heading">
        <h2>Create post</h2>
    </div>
    <div class="content">
        <form method="post" action="/user/post/store" enctype="multipart/form-data" id="create-post-form">
            <div class='form-control'>
                <label>Title</label>
                <input type="text" class="form-input" name="title" id="title">
            </div>
            <div  class='form-control'>
                <label class="form-label">Content</label>
                <textarea name="content" class="form-input" id="editor"></textarea>
            </div>

            <div  class='form-control'>
                <label class="form-label">Title image: </label>
                <input type="file" accept="image/jpeg,image/png,image/gif" name="title_img">
            </div>
            <div  class='form-control'>
                <label class="form-label">Category</label>
                <select id="category" name="category_id">
                    <?php foreach($categories as $category):?>
                        <option value="<?=$category['id']?>" selected><?=$category['title']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div  class='form-control'>
                <fieldset class="tag-field">
                    <legend>Post tags:</legend>
                    <?php foreach($tags as $tag):?>
                        <label class="form-label tag" title="<?=$tag['description']?>"><input  type="checkbox" name="tag[]" value="<?=$tag['id']?>"> <?=$tag['title']?></label>
                    <?php endforeach;?>
                </fieldset>
            </div>
            <div  class='form-control'>
                <input type="checkbox" name="is_published"><label class="form-label"> Published</label>
            </div>
            <div  class='form-control'>
                <button type="reset" class="btn">Reset</button>
                <button type="submit" class="btn">Create</button>
            </div>
        </form>
    </div>
</article>

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
