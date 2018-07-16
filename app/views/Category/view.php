<!--Хлебные крошки начало-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <?=$breadcrumbs;?>
            </ol>
        </div>
    </div>
</div>
<!--Хлебные крошки конец-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <!--Вывод продуктов начало-->
            <div class="col-md-9 prdt-left">
                <?php if(!empty($products)): ?>
                <div class="product-one">
                    <?php foreach($products as $product): ?>
                        <div class="col-md-4 product-left p-left">
                        <div class="product-main simpleCart_shelfItem">
                            <a href="product/<?=$product->alias;?>" class="mask"><img class="img-responsive zoom-img" src="<?=$product->img;?>" alt="" /></a>
                            <div class="product-bottom">
                                <h3><?=$product->title;?></h3>
                                <p>Купить сейчас</p>
                                <h4>
                                    <a data-id="<?=$product->id;?>" class="add-to-cart-link" href="cart/add?id=<?=$product->id;?>"><i></i></a> <span class=" item_price"><?=$product->price;?> грн.</span>
                                    <?php if($product->old_price): ?>
                                        <small><del><?=$product->old_price;?> грн.</del></small>
                                    <?php endif; ?>
                                </h4>
                            </div>
                            <?php if($product->old_price): ?>
                            <div class="srch srch1">
                                <span>
                                    <?php discount($product->old_price, $product->price);?>
                                </span>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
                    <div class="text-center">
                            <?php if($pagination->countPages > 1): ?>
                                <?=$pagination;?>
                            <?php endif; ?>
                    </div>
                </div>
                <?php else: ?>
                    <h3>В этой категории нет доступных товаров</h3>
                <?php endif; ?>
            </div>
            <!--Вывод продуктов конец-->
            <?php if(!empty($products)): ?>
            <div class="col-md-3 prdt-right">
                <div class="w_sidebar">
                    <section  class="sky-form">
                        <h4>Показать только</h4>
                        <div class="row1 scroll-pane">
                            <div class="col col-4 filters">
                                <label class="checkbox"><input value="hit" type="checkbox" name="checkbox" <?php if(!empty($filters) && in_array('hit', $filters)) echo 'checked'; ?>><i></i>Хиты</label>
                                <label class="checkbox"><input value="publish" type="checkbox" name="checkbox" <?php if(!empty($filters) && in_array('publish', $filters)) echo 'checked'; ?>><i></i>Товары в наличии</label>
                                <label class="checkbox"><input value="old_price" type="checkbox" name="checkbox" <?php if(!empty($filters) && in_array('old_price', $filters)) echo 'checked'; ?>><i></i>Товары со скидкой</label>
                            </div>
                        </div>
                    </section>
                    <section  class="sky-form">
                        <h4>Сортировать по цене</h4>
                        <div class="row1 scroll-pane">
                            <div class="col col-4">
                                <div class="input-group" style="padding: 1em">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input name="price1" type="number" class="form-control" placeholder="От" <?php if(!empty($_GET['price1'])): ?> value="<?=$_GET['price1'];?>"<?php endif;?>>
                                        </div>
                                        <div class="col-md-6">
                                            <input name="price2" type="number" class="form-control" placeholder="До" <?php if(!empty($_GET['price2'])): ?> value="<?=$_GET['price2'];?>"<?php endif;?>>
                                        </div>
                                    </div>
                                    <button style="margin-top: 1em" type="button" class="btn btn-default priceSubmit">Применить</button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <?php endif;?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>