<?php include ROOT . '/view/layouts/header.php'; ?>

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
            <h2 class="title text-center catalog_title">Корзина</h2>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Корзина</h2>

                    <?php if ($productsInCart): ?>
                        <p>Вы выбрали такие товары:</p>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>Код товара</th>
                                <th>Название</th>
                                <th>Стомость, $</th>
                                <th>Количество, шт</th>
                                <th>Удалить</th>
                            </tr>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?php echo $product['code'];?></td>
                                    <td>
                                        <a href="/product/<?php echo $product['id'];?>">
                                            <?php echo $product['name'];?>
                                        </a>
                                    </td>
                                    <td><?php echo $product['price'];?></td>
                                    <td><?php echo $productsInCart[$product['id']];?></td>
                                    <td>
                                        <a href="/cart/delete/<?php echo $product['id'];?>">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4">Общая стоимость, BYN:</td>
                                <td><?php echo $totalPrice;?></td>
                            </tr>

                        </table>

                        <a class="btn btn-default checkout" href="/cart/checkout"><i class="fa fa-shopping-cart"></i> Оформить заказ</a>
                    <?php else: ?>
                        <p>Корзина пуста</p>

                        <a class="btn btn-default checkout" href="/"><i class="fa fa-shopping-cart"></i> Вернуться к покупкам</a>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>


<?php include ROOT . '/view/layouts/footer.php'; ?>