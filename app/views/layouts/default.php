<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?=$this->getMeta();?>
</head>
<body>
    <header><nav></nav></header>
    <main>
    
        <h1>Шаблон DEFAULT</h1>
        
        <?=$content;?>
        
        <?php
        //  Вывод всех запрос к БД с помощью RedBeanPHP
            use \RedBeanPHP\R as R;
        
            $logs = R::getDatabaseAdapter()
                    ->getDatabase()
                    ->getLogger();

            debug( $logs->grep( 'SELECT' ) );
?>
        
    </main>
    <footer></footer>
</body>
</html>