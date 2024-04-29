<?php 

$content = '


<div class="form-container flex-col">
<form action="../endpoints/register_endpoint.php" method="post" class="flex-col">
    <h5>Sign Up</h5>
    <div class="flex-col input-container">
        <label for="first-name">First name</label>
        <input type="first-name" name="first-name" id="first-name" placeholder="John..." required />
    </div>
    <div class="flex-col input-container">
        <label for="last-name">Last name</label>
        <input type="last-name" name="last-name" id="last-name" placeholder="Doe..." required />
    </div>
    <div class="flex-col input-container">
        <label for="username">Username</label>
        <input type="username" name="username" id="username" placeholder="user.name" required />
    </div>
    <div class="flex-col input-container">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="name@company.com" required />
    </div>
    <div class="flex-col input-container">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="••••••••" required />
    </div>
    <div class="flex-col input-container">
        <label for="account-type">I want to...</label>
        <select id="account-type" name="account-type">
            <option value="buyer">Buy</option>
            <option value="seller">Sell</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <button type="submit" class="action-btn">Sign Up</button>
    <div>
        Already have an account? <a href="../views/login.php" class="blue">Login</a>
    </div>
</form>
</div>


';


include 'main_template.php';

?>