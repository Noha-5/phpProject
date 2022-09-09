
<header>
    <h1><?= $viewProps['pageTitle'] ?></h1>
    <div class="buttons">
        <button form="product_form">Save</button>
        <a href="/">Cancel</a>
    </div>
</header>

<hr>

<form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="outset-shadow" id="product_form">
    <section class="add-form">

        <div class="row">
            <label for="sku">SKU</label>
            <input type="text" id="sku" name="sku" required>
        </div>
        <div class="row">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="row">
            <label for="price">Price ($)</label>
            <input type="number" id="price" name="price" required step=".01" min="0">
        </div>
        <div class="row">
            <label for="productType">Type Switcher</label>
            <select id="productType" name="productType" required>
                <option selected disabled value="">--Please Select Type--</option>
                <option id="DVD" value="Dvd">DVD</option>
                <option id="Book" value="Book">Book</option>
                <option id="Furniture" value="Furniture">Furniture</option>
            </select>
        </div>

        <!-- DVD Form -->
        <section data-form="Dvd">
            <div class="row">
                <label for="size">Size (MB)</label>
                <input type="number" id="size" name="size" min="0">
                <div class="description">*Please provide size in MB*</div>
            </div>
        </section>
        
        <!-- Book Form -->
        <section data-form="Book">
            <div class="row">
                <label for="weight">Weight (KG)</label>
                <input type="number" id="weight" name="weight" min="0">
                <div class="description">*Please provide weight in KG*</div>
            </div>
        </section>
        
        <!-- Furniture Form -->
        <section data-form="Furniture">
            <div class="row">
                <label for="height">Height (CM)</label>
                <input type="number" id="height" name="height" min="0">
            </div>
            <div class="row">
                <label for="width">Width (CM)</label>
                <input type="number" id="width" name="width" min="0">
            </div>
            <div class="row">
                <label for="length">Length (CM)</label>
                <input type="number" id="length" name="length" min="0">
                <div class="description">*Please provide dimension in HxWxL fromat*</div>
            </div>
        </section>

        <div class="row" style="color: red">
            <?= $viewProps['errMsg'] ?>
        </div>
    </section>
</form>

<script src="/assets/js/forms.js"></script>