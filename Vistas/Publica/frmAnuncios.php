<main class="main">
    <div class="container text-center pt-3 pb-5">
        <h1 class="text-light pb-3">Anuncios</h1>
        <div class="row">
            <div class="card-columns">
                <?php while ($pro = $todoslosproductos->fetch_object()){ ?>
                    <div class="card bg-secondary">
                        <img src="img/<?= $pro->vchImagen; ?>" class="card-img-top img">
                        <div class="card-body">
                            <h5 class="card-title"><?= $pro->vchDescripcion; ?></h5>
                           
                                
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    
</main>