<section class="index-login">
    <div class="wrapper">
        <div class="index-login-signup">
            <h4>SIGN UP</h4>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="uid" placeholder="username">
                <input type="password" name="pwd" placeholder="password">
                <input type="password" name="pwdrepeat" placeholder="repeat password">
                <input type="text" name="email" placeholder="email">
                <br>
                <button name="submit" type="submit">SIGN UP</button>
            </form>
        </div>

        <div class="index-login-login">
            <h4>LOGIN</h4>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="uid" placeholder="username">
                <input type="password" name="pwd" placeholder="password">
                <br>
                <button name="submit" type="submit">SIGN UP</button>
            </form>
        </div>

    </div>
</section>