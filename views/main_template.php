<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pulse Realty</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel='stylesheet'  href='../css/home.css'>
    <link rel='stylesheet'  href='../css/forms.css'>
    <?php echo $content_css; ?>
</head>
<body>
    <header>
        <!-- Header content -->
    </header>
    <nav class='flex-row justify-between align-center'>
        <div class='flex-row' style='gap:20px'>
            <a href="../views/home.php">
                <h1>
                    <span class='blue'>Pulse</span> Realty
                </h1>
            </a>
        </div>
        <ul class='flex-row'>
            <li>
                <a href="../views/home.php" aria-current="page">Home</a>
            </li>
            <?php 
                session_start();

                if(isset($_SESSION['account_type'])) {
                    $type = $_SESSION['account_type'];

                    if ($type == 'seller'){

                        echo "
                        <li>
                            <a href='../views/sellers_dashboard.php'>Seller Dashboard</a>
                        </li>";
                    }
                    elseif($type == 'buyer'){

                        echo "
                        <li>
                            <a href='../views/buyers_dashboard.php'>Buyer Dashboard</a>
                        </li>";
                    }
                    elseif($type == 'admin'){

                        echo "
                        <li>
                            <a href='../views/admin_dashboard.php'>Admin Dashboard</a>
                        </li>";
                    }
                }
            ?>
        </ul>
        <div class="flex-row align-center" style="gap:8px">
            <?php
            session_start();
            if(isset($_SESSION['first_name'])) {
                // If the 'first_name' session variable is set, display personalized greeting and logout button
                echo "<p>Welcome, {$_SESSION['first_name']}!</p>";
                echo "<a href='../endpoints/logout_endpoint.php'><button type='button' class='action-btn'>Logout</button></a>";
            } else {
                // If 'first_name' session variable is not set, display login and sign-up buttons
                echo "<a href='../views/login.php'><button type='button' class='action-btn'>Login</button></a>";
                echo "<a href='../views/sign_up.php'><button type='button' class='action-btn'>Sign up</button></a>";
            }
            ?>
        </div>
    </nav>

    
    
    <main  class='pt-24 pl-3.5 pr-3.5 flex flex justify-center'>
        <!-- php file should include a $conent variable with some html  -->
        <?php echo $content; ?>
    </main>
    
    <footer>
        <!-- do we need one?  -->
    </footer>

</body>
</html>
