<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
<!-- Basic Page Needs -->
<meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title>Sela - @yield('title')</title>

<meta name="author" content="CreativeLayers">

<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Boostrap style -->
<!-- <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/bootstrap.min.css')}}"> -->
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/bootstrap/css/bootstrap.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/style.css')}}">
<!-- Theme style -->
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/main.css')}}">
<!-- Reponsive -->
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/responsive.css')}}">

<link rel="shortcut icon" href="{{asset('public/frontend/images/logos/logo-icon.png')}}">

@yield('css')

</head>
<body class="header_sticky">
<div class="boxed">

<div class="overlay"></div>

<!-- Preloader -->
<div class="preloader">
    <div class="clear-loading loading-effect-2">
        <span></span>
    </div>
</div><!-- /.preloader -->

<section id="header" class="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <ul class="social-media-item d-flex flat-support">
                        <li><i class="fa fa-facebook-f" alt="facebook"></i></li>
                        <li><i class="fa fa-youtube"></i></li>
                        <li><i class="fa fa-twitter"></i></li>
                        <li><i class="fa fa-google-plus"></i></li>
                    </ul>
                </div><!-- /.col-md-4 -->
                <div class="col-md-4">
                    <ul class="flat-infomation">
                        <li class="phone">
                            Liên hệ: <a href="#" title="">(+84) 0913.239.053</a>
                        </li>
                    </ul><!-- /.flat-infomation -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4">
                    <ul class="flat-unstyled">
                        <li class="account">
                            <a href="#" title="">Tài khoản<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul class="unstyled">
                                <li>
                                    <a href="#" title="">Đăng nhập</a>
                                </li>
                                <li>
                                    <a href="wishlist.html" title="">Wishlist</a>
                                </li>
                                <li>
                                    <a href="shop-cart.html" title="">Giỏ hàng</a>
                                </li>
                                <li>
                                    <a href="my-account.html" title="">Thông tin tài khoản</a>
                                </li>
                                <li>
                                    <a href="shop-checkout.html" title="">Checkout</a>
                                </li>
                            </ul><!-- /.unstyled -->
                        </li>
                        <li>
                            <a href="#" title="">Viet Nam<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul class="unstyled">
                                <li>
                                    <a href="#" title="">English</a>
                                </li>
                            </ul><!-- /.unstyled -->
                        </li>
                    </ul><!-- /.flat-unstyled -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-top -->
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div id="logo" class="logo">
                        <a href="index.html" title="">
                            <img src="{{asset('public/frontend/images/logos/logo.png')}}" alt="">
                        </a>
                    </div><!-- /#logo -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-6">
                    <div class="top-search">
                        <form action="" method="post" class="form-search" accept-charset="utf-8">
                            <div class="box-search">
                                <input type="text" name="search" placeholder="Search what you looking for ?">
                                <span class="btn-search">
                                    <button type="submit" class="waves-effect"><img src="{{asset('public/frontend/images/icons/search.png')}}" alt=""></button>
                                </span>
                            </div><!-- /.box-search -->
                        </form><!-- /.form-search -->
                    </div><!-- /.top-search -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-3">
                    <div class="box-cart">
                        <!-- .menu-compare-wishlist -->
                        <!-- <div class="inner-box">
                            <ul class="menu-compare-wishlist">
                                <li class="compare">
                                    <a href="compare.html" title="">
                                        <img  src="{{asset('public/frontend/images/icons/compare.png')}}" alt="">
                                    </a>
                                </li>
                                <li class="wishlist">
                                    <a href="wishlist.html" title="">
                                        <img  src="{{asset('public/frontend/images/icons/wishlist.png')}}" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div> -->
                        <!-- /.menu-compare-wishlist -->
                        <div class="inner-box">
                            <a href="#" title="">
                                <div class="icon-cart">
                                    <img  src="{{asset('public/frontend/images/icons/cart.png')}}" alt="">
                                    <span>4</span>
                                </div>
                                <div class="price">
                                    $0.00
                                </div>
                            </a>
                            <div class="dropdown-box">
                                <ul>
                                    <li>
                                        <div class="img-product">
                                            <img  src="{{asset('public/frontend/images/product/other/img-cart-1.jpg')}}" alt="">
                                        </div>
                                        <div class="info-product">
                                            <div class="name">
                                                Samsung - Galaxy S6 4G LTE <br />with 32GB Memory Cell Phone
                                            </div>
                                            <div class="price">
                                                <span>1 x</span>
                                                <span>$250.00</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <span class="delete">x</span>
                                    </li>
                                    <li>
                                        <div class="img-product">
                                            <img  src="{{asset('public/frontend/images/product/other/img-cart-2.jpg')}}" alt="">
                                        </div>
                                        <div class="info-product">
                                            <div class="name">
                                                Sennheiser - Over-the-Ear Headphone System - Black
                                            </div>
                                            <div class="price">
                                                <span>1 x</span>
                                                <span>$250.00</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <span class="delete">x</span>
                                    </li>
                                </ul>
                                <div class="total">
                                    <span>Subtotal:</span>
                                    <span class="price">$1,999.00</span>
                                </div>
                                <div class="btn-cart">
                                    <a href="shop-cart.html" class="view-cart" title="">View Cart</a>
                                    <a href="shop-checkout.html" class="check-out" title="">Checkout</a>
                                </div>
                            </div>
                        </div><!-- /.inner-box -->
                    </div><!-- /.box-cart -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-middle -->
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-2">
                    <div id="mega-menu">
                        <div class="btn-mega"><span></span>DANH MỤC</div>
                        
                        <ul class="menu">
                        {{-- {!!$categories!!} --}}
                            
                            @foreach ($categories as $category)
                            <li>
                                <a href="#" title="" class="dropdown">
                                    <span class="menu-img">
                                        <img  src="{{asset('public/frontend/images/icons/menu/01.png')}}" alt="">
                                    </span>
                                    <span class="menu-title">
                                        {{ $category->name}}
                                    </span>
                                </a>
                                
                                
                                    <div class="drop-menu">
                                @foreach ($category->subs as $record)
                                    <div class="one-third">
                                        <div class="cat-title">
                                            {{$record->name}}
                                        </div>
                                        <ul>
                                        
                                        @foreach ($record->subs as $rec)
                                            <li>
                                                <a href="#" title="">{{ $rec->name }}</a>
                                            </li>
                                        @endforeach
                                        </ul>
                                        <div class="show">
                                            <a href="#" title="">Shop All</a>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                                
                                
                               
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- /.col-md-3 -->
                <div class="col-md-9 col-10">
                    <div class="nav-wrap">
                        <div id="mainnav" class="mainnav">
                            <ul class="menu">
                                <li class="column-1">
                                    <a href="index.html" title="">Trang chủ</a>
                                </li><!-- /.column-1 -->
                                <li class="has-mega-menu">
                                    <a href="#" title="">Sản phẩm</a>
                                    <div class="submenu">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12">
                                                <h3 class="cat-title">Accessories</h3>
                                                <ul class="submenu-child">
                                                    <li>
                                                        <a href="shop.html" title="">Electronics</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" title="">Furniture</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" title="">Accessories</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" title="">Divided</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" title="">Everyday Fashion</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" title="">Modern Classic</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" title="">Party</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="shop.html" title="">Shop All</a>
                                                </div>
                                            </div><!-- /.col-lg-3 col-md-12 -->
                                            <div class="col-lg-3 col-md-12">
                                                <h3 class="cat-title">Laptop And Computer</h3>
                                                <ul class="submenu-child">
                                                    <li>
                                                        <a href="shop.html" title="">Networking & Internet Devices</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" title="">Laptops, Desktops & Monitors</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" title="">Hard Drives & Memory Cards</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" title="">Printers & Ink</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" title="">Networking & Internet Devices</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" title="">Computer Accessories</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" title="">Software</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="shop.html" title="">Shop All</a>
                                                </div>
                                            </div><!-- /.col-lg-3 col-md-12 -->
                                            <div class="col-lg-4 col-md-12">
                                                <h3 class="cat-title">Audio & Video</h3>
                                                <ul class="submenu-child">
                                                    <li>
                                                        <a href="shop.html" title="">Headphones & Speakers</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" title="">Home Entertainment Systems</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" title="">MP3 & Media Players</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="shop.html" title="">Shop All</a>
                                                </div>
                                            </div><!-- /.col-lg-4 col-md-12 -->
                                            <div class="col-lg-2 col-md-12">
                                                <h3 class="cat-title">Home Audio</h3>
                                                <ul class="submenu-child">
                                                    <li>
                                                        <a href="shop.html" title="">Home Theater Systems</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" title="">Receivers & Amplifiers</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" title="">Speakers</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" title="">CD Players & Turntables</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" title="">High-Resolution Audio</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" title="">4K Ultra HD TVs</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="shop.html" title="">Shop All</a>
                                                </div>
                                            </div><!-- /.col-lg-2 col-md-12 -->
                                        </div><!-- /.row -->
                                    </div><!-- /.submenu -->
                                </li><!-- /.has-mega-menu -->
                                <li class="column-1">
                                    <a href="about.html" title="">Giới thiệu</a>
                                </li><!-- /.column-1 -->
                                <li class="column-1">
                                    <a href="#" title="">Tin tức</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="blog.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Tài liệu kỹ thuật</a>
                                        </li>
                                        <li>
                                            <a href="blog.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Tin nội bộ</a>
                                        </li>
                                        <li>
                                            <a href="blog.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Tạp chí Sela</a>
                                        </li>
                                        <li>
                                            <a href="blog.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Tin công nghệ</a>
                                        </li>
                                        <li>
                                            <a href="blog.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Tin tức ngành hóa chất</a>
                                        </li>
                                    </ul><!-- /.submenu -->
                                </li><!-- /.column-1 -->
                                
                                <li class="column-1">
                                    <a href="contact.html" title="">Báo giá</a>
                                </li><!-- /.column-1 -->
                                <li class="column-1">
                                    <a href="contact.html" title="">Liên hệ</a>
                                </li><!-- /.column-1 -->
                            </ul><!-- /.menu -->
                        </div><!-- /.mainnav -->
                    </div><!-- /.nav-wrap -->
                    <div class="btn-menu">
                        <span></span>
                    </div><!-- //mobile menu button -->
                </div><!-- /.col-md-9 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-bottom -->
</section><!-- /#header -->