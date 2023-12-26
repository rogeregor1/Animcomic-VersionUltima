<body>
<?php
        include_once('layout/menu.php');
    ?>
    <main class="cards-container">
        <?php
            $response = json_decode(file_get_contents('http://localhost/Animcomic-VersionUltima/api/productos/api-productos.php?categoria=libros'), true);
            if($response['statuscode'] == 200){
                foreach($response['items'] as $item){
                    include('layout/items.php');
                }
            }else{
                echo $response['response'];
            }
        ?>
        
    </main>

    <script src="js/main.js"></script>
</body>