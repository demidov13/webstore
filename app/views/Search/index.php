<!--Хлебные крошки начало-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?=PATH;?>">Главная</a></li>
                <li>Поиск по запросу "<?=h($query);?>"</li>
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
                </div>
                <?php endif; ?>
            </div>
            <!--Вывод продуктов конец-->
            <div class="clearfix"></div>
        </div>
    </div>
</div>