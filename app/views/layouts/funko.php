<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<base href="/">
<?=$this->getMeta();?>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="megamenu/css/style.css">
<link rel="stylesheet" href="megamenu/css/ionicons.min.css">
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<link href="css/mystyle.css" rel="stylesheet" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
</head>
<body> 
	<!--top-header-->
	<div class="top-header">
		<div class="container">
			<div class="top-header-main">
				<div class="col-md-6 top-header-left">
                    <div class="drop">
                        <div class="btn-group div-account">
                            <a class="dropdown-toggle" data-toggle="dropdown">Личный кабинет <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php if(!empty($_SESSION['user'])): ?>
                                    <li><a href="#">Добро пожаловать, <?=$_SESSION['user']['name'];?></a></li>
                                    <li><a href="user/logout">Выход</a></li>
                                <?php else: ?>
                                    <li><a href="user/login">Вход</a></li>
                                    <li><a href="user/signup">Регистрация</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
				</div>
				<div class="col-md-6 top-header-left">
					<div class="cart box_1 div-cart">
                        <a href="cart/show" onclick="getCart(); return false;">
                        <div class="total">
                            <img src="images/cart-1.png" alt="" />
                            <?php if(!empty($_SESSION['cart'])): ?>
                                <span class="simpleCart_total"><?=$_SESSION['cart.sum'];?> грн.</span>
                            <?php else: ?>
                                <span class="simpleCart_total">Корзина пуста</span>
                            <?php endif; ?>
                        </div>
                    </a>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--top-header-->
	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container">
			<div class="header">
				<div class="col-md-9 header-left">
				<div class="menu-container">
                    <div class="menu">
                        <?php new \app\widgets\menu\Menu([
                            'tpl' => WWW . '/menu/menu.php'
                        ]); ?>
                    </div>
                </div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-3 header-right"> 
				<div class="search-bar">
                    <form action="search" method="get" autocomplete="off">
                        <input type="text" class="typeahead" id="typeahead" name="s" placeholder="Поиск">
                        <input type="submit" value="">
                    </form>
				</div>
			</div>
			<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end bottom-header-->
		<!--start-logo-->
    <a href="<?=PATH;?>"><div class="logo"></div></a>
		<!--end-logo-->

    <?=$content;?>

	<!--footer-top-start-->
	<div class="information">
		<div class="container">
			<div class="infor-top">
				<div class="col-md-3 infor-left">
					<h3>Follow Us</h3>
					<ul>
						<li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
						<li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
						<li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Information</h3>
					<ul>
						<li><a href="#"><p>Specials</p></a></li>
						<li><a href="#"><p>New Products</p></a></li>
						<li><a href="#"><p>Our Stores</p></a></li>
						<li><a href="contact.html"><p>Contact Us</p></a></li>
						<li><a href="#"><p>Top Sellers</p></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>My Account</h3>
					<ul>
						<li><a href="account.html"><p>My Account</p></a></li>
						<li><a href="#"><p>My Credit slips</p></a></li>
						<li><a href="#"><p>My Merchandise returns</p></a></li>
						<li><a href="#"><p>My Personal info</p></a></li>
						<li><a href="#"><p>My Addresses</p></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Store Information</h3>
					<h4>The company name,
						<span>Lorem ipsum dolor,</span>
						Glasglow Dr 40 Fe 72.</h4>
					<h5>+955 123 4567</h5>	
					<p><a href="mailto:example@email.com">contact@example.com</a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--footer-top-end-->
	<!--footer-bottom-start-->
	<div class="footer">
		<div class="container">
			<div class="footer-top">
				<div class="col-md-6 footer-left">
				</div>
				<div class="col-md-6 footer-right">					
					<p>© 2018 All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--footer-bottom-end-->
    <!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Корзина</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                <a href="cart/view" type="button" class="btn btn-primary">Оформить заказ</a>
                <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>
            </div>
        </div>
    </div>
</div>
    <!-- Modal end-->
    <div class="preloader"><img src="images/ring.svg" alt=""></div>
<script> var path = '<?=PATH;?>'; </script>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.js"></script>
<script src="js/typeahead.bundle.js"></script>
<script src="js/jquery.easydropdown.js"></script>
<script type="text/javascript">
    $(function() {

        var menu_ul = $('.menu_drop > li > ul'),
            menu_a  = $('.menu_drop > li > a');

        menu_ul.hide();

        menu_a.click(function(e) {
            e.preventDefault();
            if(!$(this).hasClass('active')) {
                menu_a.removeClass('active');
                menu_ul.filter(':visible').slideUp('normal');
                $(this).addClass('active').next().stop(true,true).slideDown('normal');
            } else {
                $(this).removeClass('active');
                $(this).next().stop(true,true).slideUp('normal');
            }
        });

    });
</script>
<script src="megamenu/js/megamenu.js"></script>
<script src="js/imagezoom.js"></script>
<script src="js/main.js"></script>
</body>
</html>