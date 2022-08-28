<article>
    <div class="heading">
        <h2><?=$post['title']?></h2>
    </div>
    <div class="content">
        <?php if($post['title_img']!=''):?>
            <img src="/<?=$post['title_img']?>" width="100%"/>
        <?php else:?>
            <img src="/public/img/img1.jpg" width="100%"/>
        <?php endif;?>
        <?=$post['content']?>"
    </div>
    <?php if(!empty($tags)):?>
        <div class="tags">
            <?php foreach($tags as $tag):?>
                <a href="/main/tags?id=<?=$tag['id']?>" class="">#<?=$tag['title']?></a>
            <?php endforeach;?>
        </div>
    <?php endif;?>
    <div class="info">
        <p>By Admin on <?=$post['create_date']?></p>
    </div>
    <div class="post-footer">
        <span>Rating:<i><?=$post['rating']?></i></span>
        <span><a href="/post/like?id=<?=$post['id']?>"><i class="far fa-thumbs-up"> Like</i></a> <a href="/post/dislike?id=<?=$post['id']?>"><i class="far fa-thumbs-down"> Dislike</i></a></span>
        <span><a href="/post/bookmark?id=<?=$post['id']?>"><i class="far fa-bookmark"> Remember post</i></a></span>
        <span><a href=""><i class="far fa-comment"> <?=$commentCount?> Comments</i></a></span>
    </div>
</article>

<h2 id="comments">Commentary</h2>

<?php if($commentCount === 0):?>
    <article>
        <p>No comments for this post... Create first!</p>
    </article>
<?php else:?>
    <!-- Comments  -->
    <?php foreach($comments as $comment):?>
        <article id="<?=$comment['id']?>">
            <div>
                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8b/Avatar_2_logo.jpg/220px-Avatar_2_logo.jpg" width='40' height='40' alt="avatar">
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
<?php endif;?>

<?php if(!empty($_SESSION['user'])):?>
    <!-- Comment form -->
    <section>
        <h3>Leave a Comment</h3>

        <form id="comment-form" class="comment-form" action="/comment/create" method="post">
            <fieldset>
                <textarea name="comment" onBlur="if(this.value=='') this.value='Message'" onFocus="if(this.value =='Message' ) this.value=''">Message</textarea>
                <input type="hidden" name="post_id" value="<?=$post['id']?>">
                <div class="buttons">
                    <button type="reset">Clear</button>
                    <button type="submit">Send</button>
                </div>
            </fieldset>
        </form>
    </section>
<?php else:?>
    <article>
        <p>Sign in to leave a comment: <a href="/account/login" class="text-black">login</a></p>
    </article>

<?php endif;?>

<script>
    function myFunction(x) {
        x.classList.remove('far');
        //x.classList.add('fas');
    }
</script>
