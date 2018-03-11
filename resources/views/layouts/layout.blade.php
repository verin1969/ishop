<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="Интернет магазин для занятий разными видами hobby и страдания разной фигней">
    <meta name="author" content="Вячеслав Ерин">
    <meta name="keywords" content="hobby, электронные наборы, компоненты">
    <meta property="og:title" content="Интернет магазин мелочей">
    <meta property="og:description" content="Интернет магазин для занятий разными видами hobby и страдания разной фигней">
    <meta property="og:url" content="http://localhost:8000">
    <meta name="robots" content="all">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Интернет магазин мелочей</title>
    <link media="all" type="text/css" rel="stylesheet" href="/css/bootstrap.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="/css/bootstrap-theme.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="/css/main.css">
    <link media="all" type="text/css" rel="stylesheet" href="/css/blue.css">
    <link media="all" type="text/css" rel="stylesheet" href="/css/owl.carousel.css">
    <link media="all" type="text/css" rel="stylesheet" href="/css/owl.transitions.css">
    <link media="all" type="text/css" rel="stylesheet" href="/css/animate.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="/css/style.css">
     <!-- Icons/Glyphs -->
    <link media="all" type="text/css" rel="stylesheet" href="/css/font-awesome.min.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/jquery.easing-1.3.min.js"></script>
    <script src="/js/bootstrap-slider.min.js"></script>
    <script src="/js/jquery.raty.min.js"></script>
    <script src="/js/wow.min.js"></script>
    <script src="/js/jquery.validate.js"></script>
    <script src="/js/scripts.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCsuLLEl0xbDJn5mHma6oOmNR13KGkIi4"></script>
</head>
<body>

<div class="wrapper">
        <!-- ============================================================= TOP NAVIGATION ============================================================= -->
<nav class="top-bar animate-dropdown">
    <div class="container">
        <div class="col-xs-12 col-sm-8 no-margin">
            <ul>
                <li><a href="/about">О компании</a></li>
                <li><a href="/contacts">Контакты</a></li>
            </ul>
        </div><!-- /.col -->

        <div class="col-xs-12 col-sm-4 no-margin">
            <ul class="right">
                @if (!Auth::guest())
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->firstname }}</a></li>
                    <li><a href="/logout">Выход</a></li>
                @else
                    <li><a href="/register">Регистрация</a></li>
                    <li><a href="/login">Вход</a></li>
                @endif
            </ul>
        </div><!-- /.col -->
    </div><!-- /.container -->
</nav><!-- /.top-bar -->
<!-- ============================================================= TOP NAVIGATION : END ============================================================= -->       
<!-- ============================================================= HEADER ============================================================= -->
<header class="no-padding-bottom header-alt">
    <div class="container no-padding">     
        <div class="col-xs-4  col-md-3 logo-holder">
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo">
                <a href="/"><img src="/images/logo.png"></a>
            </div><!-- /.logo -->
            <!-- ============================================================= LOGO : END ============================================================= -->     
        </div><!-- /.logo-holder -->
    <div class="col-xs-12 col-md-6 top-search-holder no-margin">
        <!-- ============================================================= SEARCH AREA ============================================================= -->
        <div class="search-area">
            <!--form-->
            <form method="GET" action="/search" accept-charset="UTF-8">
                <div class="control-group">
                    <input class="search-field" placeholder="Поиск" name="text" type="text">
                    <button class="search-button" type="submit"></button>  
                </div>
            </form>
            <!--/form-->
        </div><!-- /.search-area -->
    <!-- ============================================================= SEARCH AREA : END ============================================================= -->      
    </div>
    <!-- /.top-search-holder -->
    <div class="col-xs-12 col-md-3 top-cart-row no-margin">
        <div class="top-cart-row-container">
            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
            <div class="top-cart-holder dropdown animate-dropdown">
                <div class="basket">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <div class="basket-item-count">
                            <span class="count">{{ Cart::count(false) }}</span>
                            <img src="/images/icon-cart.png" alt="">
                        </div>

                        <div class="total-price-basket"> 
                            <span class="lbl">Корзина:</span>
                            <div class="total-price">
                                <span class="value">{{ Cart::total() }}</span> {{ $currency }}
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                    @if(Cart::count())
                        @foreach(Cart::content() as $row)
                            <li>
                                <div class="basket-item">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 no-margin text-center">
                                            <div class="thumb">
                                                <img alt="" src="/upload/products/{{$row->options->image }}"  width="100" height="100"  />
                                            </div>
                                        </div>
                                        <div class="col-xs-8 col-sm-8 no-margin">
                                            <div class="title">{{ $row->name }}</div>
                                            <div class="price"><span>{{ $row->qty }}</span> шт</div>
                                            <div class="price"><span>{{ $row->total }}</span>{{ $currency }}</div>
                                        </div>
                                    </div>
                                    <a class="close-btn" data-product="{{ $row->id }}" href="#" ></a>
                                </div>
                            </li>
                        @endforeach
                        <li class="checkout">
                            <div class="basket-item">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <a href="/cart" class="le-button">В корзину</a>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <a href="/checkout" class="le-button">Оформить заказ</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="checkout">
                            <div class="basket-item">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-2">
                                        <div class="basket-item-count">
                                            <span class="count">0</span>
                                            <img alt="" src="/images/icon-cart.png">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-10">
                                        <div class="cart-empty">В корзине нет товаров</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif
                    </ul>
                </div><!-- /.basket -->
            </div><!-- /.top-cart-holder -->
        </div><!-- /.top-cart-row-container -->
        <!-- ============================================================= SHOPPING CART DROPDOWN : END ============================================================= -->       
    </div><!-- /.top-cart-row -->
</div><!-- /.container -->

<!-- ========================================= NAVIGATION ========================================= -->
<nav id="top-megamenu-nav" class="megamenu-vertical animated">
    <div class="container">
        <div class="yamm navbar">
             <div class="collapse navbar-collapse" id="mc-horizontal-menu-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="/" class="dropdown-toggle"><span class="glyphicon glyphicon-home"></span></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Каталог</a>
                        <ul class="dropdown-menu">                                                                                                                                        <li>
                            <div class="yamm-content">
                                <div class="row" >
                                    <div class="col-xs-4 col-sm-12">
                                        <ul>                                          
                                            @foreach($categories as $category)
                                            <li><a href="/products/{{ $category->id }}">{{ $category->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </li>
                </ul><!-- /.navbar-nav -->
            </div><!-- /.navbar-collapse -->
        </div><!-- /.navbar -->
    </div><!-- /.container -->
</nav><!-- /.megamenu-vertical -->
<!-- ========================================= NAVIGATION : END ========================================= -->
</header>
@yield('content')
<footer id="footer" class="color-bg">  
    <div class="link-list-row">
        <div class="container no-padding">
            <div class="col-xs-12 col-md-4 ">
                <!-- ============================================================= CONTACT INFO ============================================================= -->
                <div class="contact-info">
                    <img src="/images/logo.png">
                    <address>
                      <strong>Наш адрес:</strong><br>
                        {{ config('setting.address','Moscow') }}
                    </address>
                    <address>
                      <strong>Контактная информация:</strong><br>
                      <abbr title="Наш сайт">URL сайта: </abbr><a href="{{ config('app.url','www.company.com') }}">{{ config('app.url','www.company.com') }}</a><br>
                      <abbr title="Наш email для связи">Email: </abbr> <a href="{{ config('setting.email','verin@allwebstudio.ru') }}">{{ config('setting.email','verin@allwebstudio.ru') }}</a><br>
                      <abbr title="Наш телефон для связи">Телефон: </abbr>{{ config('setting.phone','+7999-777-99-77') }}<br>
                    </address>
                 </div>
                <!-- ============================================================= CONTACT INFO : END ============================================================= -->
            </div>
            <div class="col-xs-12 col-md-8 no-margin">
                <!-- ============================================================= LINKS FOOTER ============================================================= -->
                <div class="link-widget">
                    <div class="widget">
                        <h3>Меню</h3>
                        <ul>
                            <li><a href="/payment">Доставка и оплата</a></li>
                            <li><a href="/service">Гарантия и сервисное обслуживание</a></li>
                            <li><a href="/contacts">Контакты</a></li>
                            <li><a href="/about">О компании</a></li>
                        </ul>
                    </div><!-- /.widget -->
                </div><!-- /.link-widget -->

               <!-- ============================================================= LINKS FOOTER : END ============================================================= -->
            </div>
        </div><!-- /.container -->
    </div><!-- /.link-list-row -->

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-margin">
                <div class="copyright">
                    © Vyacheslav Erin AllWebStudio (verin@allwebstudio) 2018 
                </div><!-- /.copyright -->
            </div>
        </div><!-- /.container -->
    </div><!-- /.copyright-bar -->

</footer><!-- /#footer -->
<!-- ============================================================= FOOTER : END ============================================================= -->   
</div><!-- /.wrapper -->
</body>
</html>