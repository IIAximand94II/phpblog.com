<!--------------NEW----------------->
<article>
    <div class="heading">
        <h2>Create post</h2>
    </div>
    <div class="content">
        <form method="post" action="/user/post/update" enctype="multipart/form-data" id="update-post-form">
            <input type="hidden" name="id" value="<?=$post['id']?>">
            <div class='form-control'>
                <label>Title</label>
                <input type="text" class="form-input" name="title" id="title" value="<?=$post['title']?>>
            </div>
            <div  class='form-control'>
                <label class="form-label">Content</label>
                <textarea name="content" class="form-input" id="editor"><?=$post['content']?></textarea>
            </div>
            <div  class='form-control'>
                <label class="form-label">Title image: </label>
                <input type="file" name="title_img" value="<?=$post['title_img']?>">
            </div>
            <div  class='form-control'>
                <label class="form-label">Category</label>
                <select id="category" name="category_id">
                    <?php foreach($categories as $category):?>
                        <?php if($category['id']==$post['category_id']):?>
                            <option value="<?=$category['id']?>" selected><?=$category['title']?></option>
                        <?php endif;?>
                        <option value="<?=$category['id']?>"><?=$category['title']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div  class='form-control'>
                <fieldset class="tag-field">
                    <legend>Post tags:</legend>
                    <?php foreach ($postTags as $postTag):?>
                        <label class="form-label tag" title="<?=$postTag['description']?>"><input checked type="checkbox" name="tag[]" value="<?=$postTag['id']?>"> <?=$postTag['title']?></label>
                    <?php endforeach;?>
                    <?php foreach($noPostTags as $noPostTag):?>
                        <label class="form-label tag" title="<?=$noPostTag['description']?>"><input  type="checkbox" name="tag[]" value="<?=$noPostTag['id']?>"> <?=$noPostTag['title']?></label>
                    <?php endforeach;?>
                </fieldset>
            </div>
            <div  class='form-control'>
                <?php if($post['is_published']=='yes'):?>
                    <input type="checkbox" name="is_published" checked>
                <?php else:?>
                    <input type="checkbox" name="is_published">
                <?php endif?>
                <label class="form-label"> Published</label>
            </div>
            <div  class='form-control'>
                <input type="reset" class="btn">
                <input type="submit" class="btn" value="Update">
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
