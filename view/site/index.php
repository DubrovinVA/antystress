<?php include ROOT . '/view/layouts/header.php'; ?>

<div class="container">
    <div class="row section">
        <div class="col-sm-4">
            <a href="#"><img src="/template/images_for_toys/Злая Птица.jpg"></a>
            <br>
            <a href="#" class="sect greentext">СКИДКИ!</a>
        </div>
        <div class="col-sm-4">
            <a href="#"><img src="/template/images_for_toys/Ло Ло.jpg"></a>
            <br>
            <a href="#" class="sect orangetext">НОВИНКИ!</a>
        </div>
        <div class="col-sm-4">
            <a href="#"><img src="/template/images_for_toys/Оранжевый валик-кот.jpg"></a>
            <br>
            <a href="#" class="sect redtext">ХИТЫ!</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-sm-3">
        <h2 class="category_title">Категории</h2>
        <div class="list-group"><!-- category-products type category == 1 -->
            <?php foreach ($categories as $categoryItem): ?>
                <?php if($categoryItem['type'] == '1'): ?>
                            <a href="/category/<?php echo $categoryItem['id'];?>" class="list-group-item category">
                                <?php echo $categoryItem['name'];?>
                            </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div><!-- /category-products type category == 1 -->
    </div>
    <div class="col-sm-9 content">
        <div><!-- category-products type category == 2 -->
            <?php foreach ($categories as $categoryItem): ?>
                <?php if($categoryItem['type'] == 2): ?>
                    <a href="/category/<?php echo $categoryItem['id'];?>" class="btn btn-link for">
                        <img src="/template/images_for_toys/romb.png" alt="" class="romb">
                        <?php echo $categoryItem['name']; ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div><!-- /category-products type category == 2 -->
        <div>
            <a href="#" class="btn btn-link sort">по обновлению</a>
            <a href="#" class="btn btn-link sort">по цене</a>
            <a href="#" class="btn btn-link sort">по скидке</a>
            <a href="#" class="btn btn-link sort">по рейтингу</a>
        </div>

        <div class="equal"> <!-- класс для выравнивания высоты колонок через flex -->
            <?php foreach ($latestProducts as $product): ?>
                <div class="col-sm-4">
                    <div class="thumbnail article">
                        <img src="<?php echo $product['image']; ?>" alt="" id="thumbnail_img"/>
                        <div class="product">
                            <a href="/product/<?php echo $product['id']; ?>">
                                <?php echo $product['name']; ?>
                            </a>
                        </div>
                        <div class="price"><?php echo $product['price']; ?> byn</div>
                        <a href="/cart/add/<?php echo $product['id']; ?>" class="btn btn-warning article-btn add-to-cart">
                            <img src="/template/images_for_toys/korzina.png" alt="Добавить в корзину">
                        </a>
                        <?php if ($product['is_new']): ?>
                            <img src="/template/images/home/new.png" class="new" alt="">
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>

<?php include ROOT . '/view/layouts/footer.php'; ?>