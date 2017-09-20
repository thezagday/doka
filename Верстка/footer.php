<div class="container-fluid">
     <div class="row callback-block">
        <div class="col-md-12">
            <h3 class="text-uppercase roboto">Оставьте заявку</h3>
            <p>Наш специалист сам перезвонит Вам в ближайшее время</p>
            <form action="" method="POST" role="form" class="input-block">
                <div class="form-group">
                    <input type="text" value="" required class="form-control" name="fio" onkeyup="this.setAttribute('value', this.value);">
                    <label class="font-light" for="fio">Ваше имя</label>
                </div>
                <div class="form-group">
                    <input type="text" value="" required class="form-control phone-mask" pattern="\W\d{3} \W\d{2}\W \d{3}-\d{2}-\d{2}" name="phone" onkeyup="this.setAttribute('value', this.value);">
                    <label class="font-light" for="phone">Номер телефона</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary font-bold">ОТПРАВИТЬ</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="footer container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-3 footer-logo">
                    <div class="row">   
                        <a href="index.php" class="navbar-brand">
                                <img src="images/logo.png" alt="logo">
                            </a>
                    </div>
                </div>
                <div class="col-sm-3 footer-nav">
                    <h4>ДЕЯТЕЛЬНОСТЬ</h4>
                    <ul>
                        <li><a href="catalog.php">Продукция и услуги</a></li>
                        <li><a href="products-in-stock.php">Продукция на складе</a></li>
                        <li><a href="development.php">Разработки</a></li>
                        <li><br></li>
                        <li><a href="files/doka.pdf" download class="btn btn-primary font-bold">Скачать каталог</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 footer-nav">
                    <h4>КОМПАНИЯ</h4>
                    <ul>
                        <li><a href="company.php">О Компании</a></li>
                        <li><a href="sert.php">Сертификаты и лицензии</a></li>
                        <li><a href="files/doka.pdf" download><span class="fa fa-floppy-o" style="margin-right: 5px;"></span>Скачать каталог</a></li>
                        <li><br></li>
                         <li><a href="sitemap.php" style="text-decoration: underline;">Карта сайта</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 footer-nav">
                   <h4>КОНТАКТЫ</h4>
                    <ul>
                        <li><span class="fa fa-map-marker" style="margin-right: 5px;"></span>Республика Беларусь, <br>   
                                                                                                      225404, г. Барановичи, ул. Войкова 25А</li>
                        <li><a href="tel:+375 (33) 307-30-74"><span class="fa fa-phone" style="margin-right: 5px;"></span>+375 (33) 307-30-74</a></li>
                        <li><a href="mailto:satop@tut.by"><span class="fa fa-envelope-o" style="margin-right: 5px;"></span>satop@tut.by</a></li>
                         <li><a href="contacts.php" style="text-decoration: underline;">Все контакты</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12 footer-bottom">
            <div class="float-left">
                <p>© 1995-<?php echo date('Y'); ?>  ООО «ДОКА»</p>
            </div>
            <div class="float-right">
                <p><a href="http://scroll.by/" target="_blank">Разработка сайтов: </a> <img src="images/logo-scroll.png" alt="scroll.by"></p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.2/baguetteBox.min.js"></script>
<script src="js/script.js"></script>
<script type="text/javascript" src="js/yandex_api.min.js"></script>
<script>
    ymaps.ready(function () {
        var myMap = new ymaps.Map('map', {
                center: [53.1228,26.0431],
                zoom: 16,
                controls: ['zoomControl', 'typeSelector',  'fullscreenControl', 'geolocationControl', 'rulerControl']
            }, {
                searchControlProvider: 'yandex#search'
            }),

            myPlacemark = new ymaps.Placemark([53.1228,26.0431], {
                hintContent: 'г. Барановичи, ул. Войкова 25А',
                balloonContent: 'ООО «ДОКА»<br>г. Барановичи, ул. Войкова 25А'
            })
        myMap.geoObjects
            .add(myPlacemark);
    });
</script>

</body>
</html>