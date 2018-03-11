@extends('layouts.layout')
@section('content')
<div id="single-product">
    <div class="container">
        <div class="no-margin col-xs-12 col-sm-6 col-md-5 gallery-holder">
            <div class="product-item-holder size-big single-product-gallery small-gallery">
                <div id="owl-single-product">
                    <div class="single-product-gallery-item" id="slide1">
                        <a><img class="img-responsive" alt='' src="/upload/products/{{ $product->image }}" width="350" height="350"/></a>
                    </div>
                </div>
            </div><!-- /.single-product-gallery -->
        </div><!-- /.gallery-holder -->        
        <div class="no-margin col-xs-12 col-sm-7 body-holder">
            <div class="body">
                    <div class="title"><a>{{$product->name}}</a></div>
                        <div class="excerpt">
                            <p>{{ strip_tags($product->description) }}</p>
                        </div>       
                        @if ($product->stock != 0)
                            <div class="prices">
                                <div class="price-current"><span>{{ $product->price }}</span> {{ $currency }}</div>
                            </div>
                            <div class="qnt-holder add-cart-button">
                                <input type="hidden" name="product_id" value="{{ $product->id }}"><a href="#" class="le-button huge">Добавить в корзину</a>
                            </div><!-- /.qnt-holder -->
                        @else
                           <div class="prices">
                                <div class="price-current"><span>Нет на складе</span></div>
                            </div>
                        @endif 
            </div><!-- /.body -->
        </div><!-- /.body-holder -->
    </div><!-- /.container -->
</div><!-- /.single-product -->
@stop