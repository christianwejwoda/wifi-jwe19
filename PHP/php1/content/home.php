
<div class="teaser">
    <img class="slides" alt="" src="https://images.pexels.com/photos/205961/pexels-photo-205961.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
    <img class="slides" alt="" src="https://images.pexels.com/photos/1454985/pexels-photo-1454985.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
</div>

<div class="award">
    <img src="img/qualitaetssiegel-goldene-eichel_300.png" alt="">
</div>

<div class="product-range">
    <h1>
        Unser Sortiment
    </h1>

    <div class="four-colums">

        <div class="item">
            <div class="item-inner">
                <img alt="" src="img/320x230.png">
                <div class="overlay">
                    <div class="inner">
                        <p>Gebäck</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="item-inner">
                <img alt="" src="img/320x230.png">
                <div class="overlay">
                    <div class="inner">
                        <p>Torten</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="item-inner">
                <img alt="" src="img/320x230.png">
                <div class="overlay">
                    <div class="inner">
                        <p>Feine Backware</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="item-inner">
                <img alt="" src="img/320x230.png">
                <div class="overlay">
                    <div class="inner">
                        <p>Saisonales</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="order-button">
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</p>
        <div class="button">
            <a href="contact">Bestellung aufnehmen</a>
        </div>
    </div>
</div>



<script src="js/jquery-3.3.1.js"></script>
<script src="js/jquery-migrate-1.4.1.min.js"></script>
<script src="slick/slick.min.js"></script>

<script>

    $(document).ready(function(){
        $(".teaser").slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: "linear",
            autoplay: true,
        });
    });

</script>
