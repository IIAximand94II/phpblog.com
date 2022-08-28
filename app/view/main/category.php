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
                <span><a href="/main/single?id=<?=$post['id']?>&#comments"><i class="far fa-comment"> 01 Commnets</i></a></span>
            </div>
        </article>
    <?php endforeach;?>
    <!-- pagination -->
    <?php if($pageno->totalPages > 1):?>
        <?=$pageno;?>
    <?php endif?>
<?php endif;?>