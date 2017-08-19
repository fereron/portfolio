<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />

    <title>Главная</title>
    <!-- <script>document.documentElement.className = 'js';</script> -->

    <link rel="stylesheet" href="{{ asset('/css/jquery.parallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/welcome.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Sans+Serif" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>

    <script>
        $(window).on('load', function () {
            $preloader = $('.loaderArea'),
                $loader = $preloader.find('.loader');
            $loader.fadeOut();
            $loader.delay(350).fadeOut('slow');
        });
    </script>

</head>

<body>
<!-- <div class="stalk"> -->

<div class="loaderArea">
    <div class="loader"></div>
</div>

</div>

<img id="bg-image" src="{{ asset('/images/main.jpg') }}" alt="" class="layer_1"/>

<div class="layer_2">
    <label>
        <input type="checkbox"  class="main_input" />
        <div class="card">
            <div class="front">
                <div class="profile-img">
                    <img src="{{ asset('/images/iron-man.jpg') }}"  alt="">
                </div>
                <h2>Руфат Кадиров</h2>
                <p>Личный сайт веб-разработчика</p>

                <ul class="socials">
                    <li>
                        <a href="vk.com">
                            <i class="fa fa-vk fa-inverse"></i>
                        </a>
                    </li>
                    <li>
                        <a href="facebook.com">
                            <i class="fa fa-facebook fa-inverse"></i>
                        </a>
                    </li>
                    <li>
                        <a href="github.com">
                            <i class="fa fa-github fa-inverse"></i>
                        </a>
                    </li>
                </ul>

                <ul class="nav_list">
                    <li><a href="#">Мои работы</a></li>
                    <li><a href="#">Обо мне</a></li>
                    <li><a href="{{ route('articles') }}">Блог</a></li>
                </ul>

            </div>
            <div class="back">

                <h2>Авторизуйтесь</h2>

                <form action="">

                    <div class="wrapper">
                        <div class="material-textfield blue">
                            <input type="text" placeholder="Login" required />
                            <label data-content="email">email</label>
                        </div>
                        <div class="material-textfield red">
                            <input type="password" placeholder="Password" required maxlength="25" />
                            <label data-content="password">password</label>
                        </div>
                    </div>

                </form>

                <div class="captcha">
                    <input type="checkbox" id="box-1">
                    <label for="box-1">Вы точно человек?</label>
                </div>

                <ul class="login_list">
                    <li><a href="#">Войти</a></li>
                    <li><a href="#">Зарегестрироваться</a></li>
                    {{--<li><a href="#">Блог</a></li>--}}
                </ul>


            </div>
        </div>
    </label>
</div>


<script src="{{ asset('/js/jquery.parallax.js') }}"></script>

<script type="text/javascript">

    jQuery(document).ready(function(){
        jQuery( '#bg-image' ).parallax(
            { mouseport: jQuery('body') },
            { xparallax: '162px',    yparallax: '100px' },
        );
    });

    function setHeiHeight() {
        $('#hei').css({
            height: $(window).height() + 'px'
        });
    }
    setHeiHeight(); // устанавливаем высоту окна при первой загрузке страницы
    $(window).resize( setHeiHeight ); // обновляем при изменении размеров окна

</script>


</body>
</html>