<?php 

$content = '


<div class="form-container flex-col">
    <form action="../endpoints/login_endpoint.php" method="post" class="flex-col">
        <h5>Log In</h5>
        <div class="flex-col input-container">
            <label for="username">Username</label>
            <input type="username" name="username" id="username" placeholder="Enter your unique username" required />
        </div>
        <div class="flex-col input-container">
            <label for="password">Your password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" required />
        </div>
        <div>
        </div>
        <button type="submit" class="action-btn">Login to your account</button>
        <div>
            Not registered? <a href="../views/sign-up" class="blue">Create account</a>
        </div>
    </form>
</div>



';


include 'main_template.php';

?>