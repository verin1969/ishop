@extends('layouts.layout')
@section('content')
<!-- ============================================================= SLIDER : START ============================================================= -->      
<div id="top-banner-and-menu" class="homepage2">
    <div class="container">
        <div class="col-xs-12">
            <div id="hero">
                <div id="owl-main" class="owl-carousel height-lg owl-ui-lg owl-theme">
                   @foreach($products as $product)
                    <div class="item row">
                        <div class="container-fluid col-xs-12 col-sm-7">
                            <div class="caption vertical-center text-left left"  style="padding-left:7%;">
                                <img src="/upload/products/{{ $product->image }}" width="350" height="350">
                            </div>
                        </div>
                        <div class="container-fluid col-xs-12 col-sm-5">
                            <div class="caption vertical-center text-left right" style="padding:5% 20% 0 0;">
                                <div class="small fadeInDown-2">
                                    {!! $product->description !!}
                                </div>
                                <div class="big-text fadeInDown-1">
                                    <span>{{ $product->price }}</span> {{ $currency }}
                                </div>
                                <div class="button-holder fadeInDown-3">
                                    <a href="/product/{{ $product->id }}" class="big le-button ">Посмотреть</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>                                 
<!-- ============================================================= SLIDER : END ============================================================= -->      
<div id="products-tab" class="wow fadeInUp animated">
    <div class="container">
        <div class="tab-holder">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#featured" data-toggle="tab">Популярные</a></li>
                <li><a href="#new-arrivals" data-toggle="tab">Новые поступления</a></li>
                <li><a href="#top-sales" data-toggle="tab">Топ продаж</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="featured">
                    <div class="product-grid-holder">
                        @foreach($featured as $product)
                        <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                            <div class="product-item">
                                <div class="image">
                                    <a href="/product/{{ $product->id }}"><img alt="" src="/upload/products/{{ $product->image }}" width="180" height="180"></a>
                                </div>
                                <div class="body">
                                    <div class="title">
                                        <a href="/product/{{ $product->id }}">{{$product->name}}</a>
                                    </div>
                                </div>
                                <div class="prices">
                                    <div class="price-current pull-right"><span>{{ $product->price }}</span> {{ $currency }}</div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <a href="#" class="le-button">Добавить в корзину</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane" id="new-arrivals">
                    <div class="product-grid-holder">                     
                        @foreach($new_arrivals as $product)
                        <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                            <div class="product-item">
                                <div class="image">
                                    <a href="/product/{{ $product->id }}"><img alt="" src="/upload/products/{{ $product->image }}"  width="180" height="180"></a>
                                </div>
                                <div class="body">
                                    <div class="title">
                                        <a href="/product/{{ $product->id }}">{{$product->name}}</a>
                                    </div>
                                </div>
                                <div class="prices">
                                    <div class="price-current pull-right"><span>{{ $product->price }}</span> {{ $currency }}</div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <a href="#" class="le-button">Добавить в корзину</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>                  
                </div>         
                <div class="tab-pane" id="top-sales">
                    <div class="product-grid-holder">
                        @foreach($top_sales as $product)
                        <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                            <div class="product-item">
                                <div class="image">
                                    <a href="/product/{{ $product->id }}"><img alt="" src="/upload/products/{{ $product->image }}"  width="180" height="180"></a>
                                </div>
                                <div class="body">
                                    <div class="title">
                                        <a href="/product/{{ $product->id }}">{{$product->name}}</a>
                                    </div>
                                </div>
                                <div class="prices">
                                    <div class="price-current pull-right"><span>{{ $product->price }}</span> {{ $currency }}</div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <a href="#" class="le-button">Добавить в корзину</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection