<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>
        <br>
        <div class="alert alert-success">
          <?php echo ($mensaje); ?>
            <a href="#" class="btn btn-success">ver carrito</a>
        </div>
        <div class="row">
            <?php
            $sentencia = $pdo->prepare("SELECT * FROM `tblproductos`");
            $sentencia->execute();
            $lisProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($lisProductos);
            ?>

            <?php foreach ($lisProductos as $producto) { ?>
                <div class="col-3">
                    <div class="card">
                        <img title="<?php echo $producto['Nombre']; ?>" class="card-img-top" src="<?php echo $producto['Imagen']; ?>" alt="<?php echo $producto['Nombre']; ?>" data-bs-toggle="popover" data-bs-title="<?php echo $producto['Nombre']; ?>" data-bs-trigger="hover" data-bs-content="<?php echo $producto['Descripcion']; ?>" height="317px">
                        <div class="card-body">
                            <span><?php echo $producto['Nombre']; ?></span>
                            <h5 class="card-title">$<?php echo $producto['Precio']; ?></h5>
                            <p class="card-text">descripcion</p>

                            <form action="" method="post">
                                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
                                <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Nombre'],COD,KEY); ?>">
                                <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio'],COD,KEY); ?>">
                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">

                            <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito
                            </button>

                            </form>
                           
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>
<?php
include 'templates/pie.php';?>