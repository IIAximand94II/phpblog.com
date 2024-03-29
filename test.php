<head>
    <meta charset="utf-8" />
    <title>Youtube Like & Dislike System</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
</head>

<body>
<?php
include 'config.php';
$user_ip = $_SERVER['REMOTE_ADDR'];
$pageID = '1'; // The ID of the page, the article or the video ...

//function to calculate the percent
function percent($num_amount, $num_total) {
    $count1 = $num_amount / $num_total;
    $count2 = $count1 * 100;
    $count = number_format($count2, 0);
    return $count;
}

// check if the user has already clicked on the unlike (rate = 2) or the like (rate = 1)
$dislike_sql = mysql_query('SELECT COUNT(*) FROM  rating WHERE ip = "'.$user_ip.'" and id_item = "'.$pageID.'" and rate = 2 ');
$dislike_count = mysql_result($dislike_sql, 0);

$like_sql = mysql_query('SELECT COUNT(*) FROM  rating WHERE ip = "'.$user_ip.'" and id_item = "'.$pageID.'" and rate = 1 ');
$like_count = mysql_result($like_sql, 0);

// count all the rate
$rate_all_count = mysql_query('SELECT COUNT(*) FROM  rating WHERE id_item = "'.$pageID.'"');
$rate_all_count = mysql_result($rate_all_count, 0);

$rate_like_count = mysql_query('SELECT COUNT(*) FROM  rating WHERE id_item = "'.$pageID.'" and rate = 1');
$rate_like_count = mysql_result($rate_like_count, 0);
$rate_like_percent = percent($rate_like_count, $rate_all_count);

$rate_dislike_count = mysql_query('SELECT COUNT(*) FROM  rating WHERE id_item = "'.$pageID.'" and rate = 2');
$rate_dislike_count = mysql_result($rate_dislike_count, 0);
$rate_dislike_percent = percent($rate_dislike_count, $rate_all_count);
?>

<script>
    $(document).ready(function() {
        var pageID = <?= $pageID;  ?>;


        $(document).on('click', '.like-btn', function(){

            $('.dislike-btn').removeClass('dislike-h');
            $(this).addClass('like-h');
            $.ajax({
                type:"POST",
                url:"ajax.php",
                data:'act=like&pageID='+pageID,
                success: function(){
                }
            });
        });


        $(document).on('click', '.dislike-btn', function(){

            $('.like-btn').removeClass('like-h');
            $(this).addClass('dislike-h');
            $.ajax({
                type:"POST",
                url:"ajax.php",
                data:'act=dislike&pageID='+pageID,
                success: function(){
                }
            });
        });

    });
</script>



<div class="tab-cnt">
    <h1>Youtube Like & Dislike System With PHP, jQuery & Ajax</h1>
    <div class="tab-tr" id="t1">
        <div class="like-btn <?php if($like_count == 1){ echo 'like-h';} ?>">Like</div>
        <div class="dislike-btn <?php if($dislike_count == 1){ echo 'dislike-h';} ?>"></div>

        <div class="stat-cnt">
            <div class="rate-count"><?php echo $rate_all_count; ?></div>
            <div class="stat-bar">
                <div class="bg-green" style="width:<?php echo $rate_like_percent; ?>%;"></div>
                <div class="bg-red" style="width:<?php echo $rate_dislike_percent; ?>%"></div>
            </div>
            <div class="dislike-count"><?php echo $rate_dislike_count; ?></div>
            <div class="like-count"><?php echo $rate_like_count; ?></div>
        </div>
    </div>

</div>
</body>
</html>



<?php
include 'config.php';
extract($_POST);
$user_ip = $_SERVER['REMOTE_ADDR'];

// check if the user has already clicked on the unlike (rate = 2) or the like (rate = 1)
$dislike_sql = mysql_query('SELECT COUNT(*) FROM  rating WHERE ip = "'.$user_ip.'" and id_item = "'.$pageID.'" and rate = 2 ');
$dislike_count = mysql_result($dislike_sql, 0);

$like_sql = mysql_query('SELECT COUNT(*) FROM  rating WHERE ip = "'.$user_ip.'" and id_item = "'.$pageID.'" and rate = 1 ');
$like_count = mysql_result($like_sql, 0);

if($act == 'like'): //if the user click on "like"
    if(($like_count == 0) && ($dislike_count == 0)){
        mysql_query('INSERT INTO rating (id_item, ip, rate )VALUES("'.$pageID.'", "'.$user_ip.'", "1")');
    }
    if($dislike_count == 1){
        mysql_query('UPDATE rating SET rate = 1 WHERE id_item = '.$pageID.' and ip ="'.$user_ip.'"');
    }
endif;

if($act == 'dislike'): //if the user click on "like"
    if(($like_count == 0) && ($dislike_count == 0)){
        mysql_query('INSERT INTO rating (id_item, ip, rate )VALUES("'.$pageID.'", "'.$user_ip.'", "2")');
    }
    if($like_count == 1){
        mysql_query('UPDATE rating SET rate = 2 WHERE id_item = '.$pageID.' and ip ="'.$user_ip.'"');
    }
endif;
?>
