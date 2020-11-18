<footer class="container-fluid p-1 mt-5">
    <div class="container-fluid row mt-4">

        <div class="col-md-1"></div>

        <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="m-auto">
                <h4 class="color-n">TavelApp Nic</h4>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">Hoteles</a></li>
                    <li><a href="#" class="text-white">Restaurantes</a></li>
                    <li><a href="#" class="text-white">Tours</a></li>
                    <li><a href="#" class="text-white">Interpretes</a></li>
                </ul>

                <h4 class="text-justify color-n">
                    Información de contacto
                </h4>

                <ul class="text-white list-unstyled">
                    <li class="mt-2"><b>Dirección:</b> Somoto / Madriz</li>
                    <li class="mt-2"><b>Telefono:</b> +505 86787654</li>
                    <li class="mt-2"><b>Correo:</b> example@gmail.com</li>
                    <li class="mt-2"><b>Sitio Web:</b>Travel App</li>
                </ul>
            </div>

        </div>

        <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="w-100">
                <h4 class="text-justify color-n">
                    Forma segura de pago
                </h4>

                <div class="text-left mb-3">
                    <img src="<?= BASE_URL ?>assets/img/paypal.jpg" class="img-fluid logo-footer w-25">
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <h4 class="text-center color-n">Escribenos</h4>
            <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

            <form action="" class="row contacto">

                <div class="form-group col-md-12 col-lg-6">
                    <input type="text" name="" id="" placeholder="Nombre" class="form-control">
                </div>

                <div class="form-group col-md-12 col-lg-6">
                    <input type="email" name="" id="" placeholder="Correo" class="form-control">
                </div>

                <div class="form-group col-md-12">
                    <textarea name="" id="" cols="5" placeholder="Comentario" rows="5" class="form-control"></textarea>
                </div>
                <div class="col-md-12 form-group">
                    <input type="submit" value="Enviar" class="btn btn-lg">
                </div>

            </form>
        </div>
    </div>

    <div class="mb-3 imgFooter">
        <img src="<?= BASE_URL ?>assets/img/logo-footer.png" class="img-fluid logo-footer">
    </div>

    <!-- iconos -->
    <div class="container-fluid icon text-center">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <a href="#"><i class="fab fa-pinterest-p"></i></a>
    </div>

    <div class="copyright text-center text-white d-flex justify-content-between flex-wrap border-top p-4 mt-3">
        <span>Copyright &copy; All Rights Reserved. Creado y Desarrollado por Smart Business</span>
        <span class="flex-grow-1 text-lg-right">Created by Smart Business</span>
    </div>
</footer>


<script src="<?= BASE_URL ?>assets/js/jquery-3.4.1.slim.min.js"></script>
<script src="<?= BASE_URL ?>assets/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL ?>assets/OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js" type="text/javascript"></script>
<script src="<?= BASE_URL ?>assets/OwlCarousel2-2.3.4/dist/owl.carousel.js" type="text/javascript"></script>
<script src="<?= BASE_URL ?>assets/js/main.js"></script>

<script type="text/javascript">
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
        }
    })
</script>

</body>

</html>