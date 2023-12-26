<?php
include_once 'controladores/cards_mostrar.php';

$item = new Cards(5);
?>
<body>
<?php
        include_once('layout/menu.php');
?>

<div class="row row-cols-1 row-cols-md-1" id="container">


    <main class="cards-container">
        <?php
            $response = json_decode(file_get_contents('http://localhost/Animcomic-VersionUltima/api/productos/api-productos.php?categoria=anime'), true);
            if($response['statuscode'] == 200){
                foreach($response['items'] as $item){
                    include('layout/items.php');
                }
            }else{
                echo $response['response'];
            }
        ?>
        
    </main>
    </div>
    <script src="js/main.js"></script>
</body>