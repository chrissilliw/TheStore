<?php

    $page = substr( $_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1);

?>

        <nav>
            <ul>
                <li class="nav-link">
                    <a href="index.php" class=" <?php echo $page == "index.php"? 'active' : '' ?> ">
                    <i class="fa-solid fa-house <?php echo $page == "index.php"? 'active-icon' : '' ?>"></i>
                        <span>Hem</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="sellers.php" class=" <?php echo $page == "sellers.php"? 'active' : '' ?> ">
                    <i class="fa-regular fa-user <?php echo $page == "sellers.php"? 'active-icon' : '' ?>"></i>
                        <span>Säljare</span>
                    </a>
                    <li class="nav-link">
                    <a href="products.php" class=" <?php echo $page == "products.php"? 'active' : '' ?> ">
                    <i class="fa-solid fa-shirt <?php echo $page == "products.php"? 'active-icon' : '' ?>"></i>
                        <span>Plagg</span>
                    </a>
                </li>
            </ul>
            
            
            
        </nav>
    </div>
</aside>