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

<!---------------------------------------------------COMMENTS-------------------------------------------------------->
<?php if($commentCount === 0):?>
    <article>
        <p>You didn't write any comments.</p>
    </article>
<?php else:?>
    <!-- Comments  -->
    <?php foreach($comments as $comment):?>
        <article id="<?=$comment['id']?>">
            <div>
                <img alt="avatar" src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8b/Avatar_2_logo.jpg/220px-Avatar_2_logo.jpg" width='40' height='40'>
                <p i="">Admin</p><p>Create on  <?=$comment['create_date']?></p>
            </div>
            <div class="content">
                <p><?=$comment['comment']?></p>
            </div>
            <div>
                <a href=""><i class="far fa-thumbs-up"> like</i></a> <a href=""><i class="far fa-thumbs-down"> dislike</i></a>
            </div>
        </article>
    <?php endforeach;?>
    <?php if($pageno->totalPages > 1):?>
        <?=$pageno;?>
    <?php endif?>
<?php endif;?>