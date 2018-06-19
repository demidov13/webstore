<?php if(!empty($_SESSION['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($_SESSION['cart'] as $id => $item): ?>
                <tr>
                    <td><a href="product/<?=$item['alias'];?>"><img src="<?=$item['img'];?>" alt="" width="100" height="100"></a></td>
                    <td><a href="product/<?=$item['alias'];?>"><?=$item['title'];?></td>
                    <td><?=$item['qty'];?></td>
                    <td><?=$item['price'];?> грн.</td>
                    <td><span data-id="<?=$id;?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true" style="cursor: pointer"></span></td>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <td>Всего товаров:</td>
                    <td colspan="4" class="text-right cart-qty"><?=$_SESSION['cart.qty'];?></td>
                </tr>
                <tr>
                    <td>На сумму:</td>
                    <td colspan="4" class="text-right cart-sum"><?=$_SESSION['cart.sum'];?> грн.</td>
                </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif; ?>