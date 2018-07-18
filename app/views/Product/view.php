<!--Хлебные крошки-->
<div class="breadcrumbs" style="margin-top: 3em">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <?=$breadcrumbs;?>
            </ol>
        </div>
    </div>
</div>
<!--Хлебные крошки конец-->
<!--Карточка товара-->
<div class="single contact" style="padding: 3em 0px;">
    <div class="container">
        <div class="single-main">
            <div class="col-md-12 single-main-left">
                <div class="sngl-top">
                    <div class="col-md-5 single-top-left">  
                        <img src="<?=$product->img;?>" alt="" width="350" height="350">                        
                    </div>
                    <?php       
                    $category = \iframe\App::$app->getProperty('category');
                    ?>
                    <div class="col-md-7 single-top-right">
                        <div class="single-para simpleCart_shelfItem">
                            <h2><?=$product->title;?></h2>
                            <h5 class="item_price" id="base-price" data-base="<?=$product->price;?>"><?=$product->price;?> грн.</h5>
                            <?php if($product->old_price): ?>
                            <del id="old-price" data-old="<?=$product->old_price;?>"><?=$product->old_price;?> грн.</del>
                            <?php endif; ?>
                                <p style="font-family: Tahoma, Geneva, sans-serif"><?=$product->content;?></p>
                            <?php if($mods): ?>
                                <div class="available">                              
                                    <ul>
                                        <li style="font-family: Tahoma, Geneva, sans-serif">
                                            <p>Производитель:</p>
                                            <select style="margin-left: 0">                                            
                                                <?php foreach($mods as $mod): ?>
                                                <option data-title="<?=$mod->title;?>" data-price="<?=$mod->price_factor;?>" value="<?=$mod->id;?>"><?=$mod->title;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </li>
                                        <div class="clearfix"> </div>
                                    </ul>
                                </div>
                            <?php endif;?>
                            <?php if($product->publish == 1): ?>
                                <div class="quantity" style="margin-top: 10px">
                                    <span style="font-family: Tahoma, Geneva, sans-serif; margin-right: 0.5em; margin-top: 1em">Количество:</span><input type="number" size="4" value="1" name="quantity" min="1" step="1">
                                </div>
                                <a id="productAdd" data-id="<?=$product->id;?>" href="cart/add?id=<?=$product->id;?>" class="add-cart item_add add-to-cart-link" style="margin-top: 1em; font-family: Tahoma, Geneva, sans-serif">Добавить в корзину</a>
                            <?php else : ?>
                            <h4 style="color: red">Нет в наличии</h4>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <!--Карточка товара конец-->
                <!--Связанные товары-->
                <?php if($related): ?>
                <div class="latestproducts">
                    <div class="product-one">
                        <h3 style="font-family: Tahoma, Geneva, sans-serif">С этим товаром покупают:</h3>
                        <?php foreach($related as $item): ?>
                        <div class="col-md-3 product-left p-left">
                            <div class="product-main simpleCart_shelfItem">
                                <a href="product/<?=$item['alias'];?>" class="mask"><img class="img-responsive zoom-img" src="<?=$item['img'];?>" alt="" /></a>
                                <div class="product-bottom">
                                    <h3><a href="product/<?=$item['alias'];?>"><?=$item['title'];?></a></h3>
                                    <p>Купить сейчас</p>
                                    <h4>
                                        <a class="item_add add-to-cart-link" href="cart/add?id=<?=$item['id'];?>" data-id="<?=$item['id'];?>"><i></i></a>
                                        <span class="item_price"><?=$item['price'];?> грн.</span>
                                        <?php if($item['old_price']): ?>
                                        <small><del><?=$item['old_price'];?> грн.</del></small>
                                        <?php endif; ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php endif; ?>
                <!--Связанные товары конец-->
                <!--Просмотренные товары-->
                <?php if($recentlyViewed): ?>
                    <div class="latestproducts">
                        <div class="product-one">
                            <h3 style="font-family: Tahoma, Geneva, sans-serif">Просмотренные товары:</h3>
                            <?php foreach($recentlyViewed as $item): ?>
                                <div class="col-md-3 product-left p-left">
                                    <div class="product-main simpleCart_shelfItem">
                                        <a href="product/<?=$item['alias'];?>" class="mask"><img class="img-responsive zoom-img" src="<?=$item['img'];?>" alt="" /></a>
                                        <div class="product-bottom">
                                            <h3><a href="product/<?=$item['alias'];?>"><?=$item['title'];?></a></h3>
                                            <p>Купить сейчас</p>
                                            <h4>
                                                <a class="item_add add-to-cart-link" href="cart/add?id=<?=$item['id'];?>" data-id="<?=$item['id'];?>"><i></i></a>
                                                <span class="item_price"><?=$item['price'];?></span>
                                                <?php if($item['old_price']): ?>
                                                <small><del><?=$item['old_price'];?></del></small>
                                                <?php endif; ?>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                <?php endif; ?>
                <!--Просмотренные товары конец-->
            </div>
            <!--Блок продукта конец-->
            <div class="clearfix"> </div>
        </div>
    </div>
</div>