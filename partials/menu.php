<?php
    $page = substr( $_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
?>

<aside>
            <div class="top">
                <h2>The Store</h2>
            </div>
            <div class="close" id="close-button">
                <span class="material-symbols-sharp">close</span>
            </div>
            <div class="sidebar">
                <a href="index.php" class="<?php echo $page == "index.php"? 'active' : '' ?>">
                    <span class="material-symbols-sharp">home</span>
                    <h3>Hem</h3>
                </a>
                <a href="sellers.php" class="<?php echo $page == "sellers.php"? 'active' : '' ?>">
                    <span class="material-symbols-sharp">
                        person
                    </span>
                    <h3>Säljare</h3>
                </a>
                <a href="products.php" <?php echo $page == "products.php"? 'active' : '' ?>>
                <span class="material-symbols-sharp">
                    styler
                </span>
                    <h3>Plagg</h3>
                </a>
            </div>
        </aside>