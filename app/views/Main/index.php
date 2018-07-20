	<!--banner-starts-->
	<!--banner-ends--> 
	<!--about-starts-->
    <?php if($universes): ?>
        <div class="about"> 
            <div class="container">
                <div class="about-top grid-1">
                    <div class="col-md-12">
                        <p class="main-title-about">Виниловые фигурки любимых героев</p>
                    </div>
                    <?php foreach ($universes as $universe): ?>
                        <a href="category/<?=$universe->alias;?>">
                            <div class="col-md-4 about-left">
                                <figure class="effect-bubba">
                                    <img class="img-responsive" src="<?=$universe->img;?>" alt=""/>
                                    <figcaption>
                                        <h2><?=$universe->title;?></h2>
                                        <p><?=$universe->description;?></p>
                                    </figcaption>
                                </figure>
                            </div>
                        </a>
                    <?php endforeach;?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>
	<!--about-end-->
	<!--product-starts-->
    <?php if($hits): ?>
        <div class="product"> 
            <div class="container hits-container">
                <div class="product-top">
                    <div class="product-one">
                        <p class="main-title-products">Популярные товары</p>
                        <?php foreach ($hits as $hit): ?>
                            <div class="col-md-3 product-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="product/<?=$hit->alias;?>" class="mask"><img class="img-responsive zoom-img" src="<?=$hit->img;?>" alt="" /></a>
                                    <div class="product-bottom">
                                        <div class="div-title"><a href="product/<?=$hit->alias;?>" class="mask"><h3><?=$hit->title;?></h3></a></div>
                                        <p>Купить сейчас</p>
                                        <h4><a class="add-to-cart-link" href="cart/add?id=<?=$hit->id;?>" data-id="<?=$hit->id;?>"><i></i></a>
                                            <span class="item_price"><?=$hit->price;?> грн.</span> 
                                                <?php if($hit->old_price): ?>
                                                    <small><del><?=$hit->old_price;?></del></small>
                                                <?php endif;?></h4>
                                    </div>
                                    <div class="srch">
                                        <span>
                                            <?php if($hit->old_price){
                                                discount($hit->old_price, $hit->price);
                                            }else{ echo 'Хит!'; }?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                        <div class="clearfix"></div>
                    </div>			
                </div>
            </div>
        </div>
    <?php endif; ?>
	<!--product-end-->