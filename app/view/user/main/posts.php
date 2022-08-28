<article>
    <div class="heading">
        <h2>Hello, <?=$user['name']?>!</h2>
    </div>
    <div class="content user-area">
        <div class="container user-info-container">
            <div class="avatar-container">
                <?php if($user['avatar']!=''):?>
                    <img class="avatar" src="/<?=USER_AVATAR.$user['avatar']?>" alt="avatar" width="200" height="200">
                <?php else:?>
                    <img class="avatar" src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8b/Avatar_2_logo.jpg/220px-Avatar_2_logo.jpg" alt="avatar">
                <?php endif;?>
            </div>
            <div class="user-info">
                <p>Your email: <b><?=$user['email']?></b></p>
                <p>Registration date: <b><?=$user['register_date']?></b></p>
                <p>Your post count: <b><?=$postsCount?></b></p>
                <a class="btn" href="/account/edit?id=<?=$user['id']?>">Edit profile</a>
                <a class="btn" href="/user/post/create" id="user-create-post">Create post</a>
            </div>
        </div>
        <div class='container'>
            <div class="buttons">
                <a href="/user/main/posts">Posts</a>
                <a href="/user/main/comments">Comments</a>
                <a href="/user/main/bookmarks">Bookmarks</a>
            </div>
        </div>
    </div>
</article>

<!-----------------------------------------------POSTS-------------------------------------------------------------->
<?php if(!empty($posts)):?>
    <!-- post -->
    <?php foreach($posts as $post):?>
        <article>
            <div class="heading">
                <div class="cont">
                    <h2><a href="/main/single?id=<?=$post['id']?>"><?=$post['title']?></a></h2>
                </div>
            </div>
            <div class="content">
                <?php if($post['title_img']!=''):?>
                    <img src="/<?=$post['title_img']?>" width="250px" height="100px"/>
                <?php else:?>
                    <img src="/public/img/img1.jpg" width="250px" height="100px"/>
                <?php endif;?>
                <p><?=substr($post['content'], 0, 300)?></p>
            </div>
            <div class="info">
                <p>By Admin on <?=$post['create_date']?></p>
            </div>
            <div class="post-footer">
                <span>Rating:<i><?=$post['rating']?></i></span>
                <span><a href="/post/like?id=<?=$post['id']?>"><i class="far fa-thumbs-up"> Like</i></a> <a href="/post/dislike?id=<?=$post['id']?>"><i class="far fa-thumbs-down"> Dislike</i></a></span>
                <span><a href="/post/bookmark?id=<?=$post['id']?>"><i class="far fa-bookmark"> Remember post</i></a></span>
                <span><a href="/main/single?id=<?=$post['id']?>&#comments"><i class="far fa-comment"> 01 Comments</i></a></span>
            </div>
            <div class='buttons'>
                <a class='menu-btn' onclick="showBlock()" href="javascript:void(0);" tabindex="1">Edit</a>
            </div>
            <div class='edits-menu' id="<?=$post['id']?>">
                <a class="btn" href="">Published</a>
                <a class="btn" href="/user/post/edit/?id=<?=$post['id']?>"><i class="fas fa-book-open"></i> Edit</a>
                <a class="btn" href="/user/post/delete/?id=<?=$post['id']?>"><i class="fa fa-trash"></i> Delete</a>
            </div>
        </article>
    <?php endforeach;?>
    <!-- pagination -->
    <?php if($pageno->totalPages > 1):?>
        <?=$pageno;?>
    <?php endif?>
<?php endif;?>

<script>
    function showBlock(){
        document.querySelector(".edits-menu").classList.toggle("show");
    }
</script>