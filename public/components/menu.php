<nav class="topNav">
    <div>
        <a href="/home/index">Home</a>
        <a href="/product/index">Products</a>
    </div>
    <div>
        <?php
        if (isset($_SESSION['user_id'])) {
            echo '<a href="/user/index" id="userButton">' . $_SESSION['user_name'] . '</a>';
        } else {
            echo '<a href="/user/login" id="loginButton">Login</a>';
            echo '<a href="/user/signup" id="signupButton">Signup</a>';
        }
        ?>
    </div>
</nav>