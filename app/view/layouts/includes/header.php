<header>
    <div class="wrap-header">

        <div class="top">
            <div class="socials">
                <ul>
                    <li><a href="#" title="facebook"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href="#" title="google"><i class="fab fa-google-plus-square"></i></a></li>
                    <li><a href="#" title="twitter"><i class="fab fa-twitter-square"></i></a></li>
                    <li><a href="#" title="youtube"><i class="fab fa-youtube-square"></i></a></li>
                </ul>
            </div>
            <div id="search">
                <div class="button-search"></div>
                <input type="text" value="Search..." onfocus="if (this.value == &#39;Search...&#39;) {this.value = &#39;&#39;;}" onblur="if (this.value == &#39;&#39;) {this.value = &#39;Search...&#39;;}">
            </div>
        </div>

        <div id="logo">
            <a href="/main/index"><h1>PHP Blog</h1></a>
            <p>phpblog.com.com | Blog on PHP</p>
        </div>

        <nav>
            <div class="wrap-nav">
                <div class="menu">
                    <ul>
                        <li><a href="/main/index">Home</a></li>
                        <li><a href="/main/about">About</a></li>
                        <?php if(empty($_SESSION['user'])):?>
                            <li><a href="/account/login">Login</a></li>
                            <li><a href="/account/registration">Registration</a></li>
                        <?php else:?>
                            <li><a href="/account/logout">Logout</a></li>
                            <li><a href="/user">User Dashboard</a></li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>