<div class="cards__item">
    <div class="card-prod">
        <div class="card-img-top"><img style="width: 218px lefth: auto;" src="img/producto/<?php echo $item['imagen']; ?>" /></div>
        <div class="card__content">
            <input type="hidden" id="id" value="<?php echo $item['id']; ?>">
            <div class="card-title"><?php echo $item['nombre'];  ?></div>
            <div class="card-text"><?php echo $item['descripcion'];  ?></div>
            <div class="card-oferta">€<?php echo $item['precio'];  ?> </div>
            <div class="card__btn">
                <button class="btn btn__block">Agregar al carrito</button>
            </div>
        </div>
    </div>
</div>