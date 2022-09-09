
<header>
    <h1><?= $viewProps['pageTitle'] ?></h1>
    <div class="buttons">
        <a href="/addProduct.php">ADD</a>
        <button id="delete-product-btn" form="delete-form">MASS DELETE</button>
    </div>
</header>

<hr>

<form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" id="delete-form">
    <section class="product-list">
        <ul>

            <?php for($i = 0; $i < count($productsArray); $i++) : ?>

                <li class="outset-shadow">
                    <label for="item<?= $i ?>">
                        <ul class="product-details">
                        <input type="checkbox" class="delete-checkbox" name="delch[]" id="item<?= $i ?>" value="<?php echo $productsArray[$i]->getSku(); ?>">
                            <?php
                                $productsArray[$i]->display();
                            ?>
                        </ul>
                    </label>
                </li>
                
            <?php endfor;?>

            <?php if(empty($productsArray)) : ?>
                <span>No products to show</span>
            <?php endif; ?>

        </ul>
    </section>
</form>

<script src="/assets/js/checkbox.js"></script>