@extends('layouts.layout')
@section('content')
<section id="cart-page">
    <div class="container">
        <!-- ========================================= CONTENT ========================================= -->
        <div class="col-xs-12 col-md-9 items-holder no-margin">
        @if( $cart->isEmpty() )
            <div class="cart-empty">Корзина пуста</div>
        @else
            @foreach(Cart::content() as $row)
            <div class="row no-margin cart-item">
                <div class="col-xs-12 col-sm-2 no-margin">
                    <a href="/product/{{ $row->id }}" class="thumb-holder">
                        <img class="lazy" alt="{{ $row->name }}" src="/upload/products/{{ $row->options->image }}" width="100" height="100" />
                    </a>
                </div>

                <div class="col-xs-12 col-sm-5" >
                    <div class="title">
                        <a href="/product/{{ $row->id }}">{{ $row->name }}</a>
                    </div>
                    <div class="price"><span>{{ $row->price }}</span> {{ $currency }}</div>
                </div> 

                <div class="col-xs-12 col-sm-3 no-margin">
                    <div class="quantity">
                        <div class="le-quantity">
                            <form>
                                <a class="minus" href="#reduce"></a>
                                <input name="product_id" type="hidden" value="{{ $row->id }}" />
                                <input name="quantity" readonly="readonly" type="text" value="{{ $row->qty }}" />
                                <a class="plus" href="#add"></a>
                            </form>
                        </div>
                    </div>
                </div> 

                <div class="col-xs-12 col-sm-2 no-margin">
                    <div class="total-price">
                        <span>{{ $row->subtotal }}</span> {{ $currency }}
                    </div>
                    <a class="close-btn" data-product="{{ $row->id }}" href="#"  ></a>
                </div>
            </div><!-- /.cart-item -->
            @endforeach
        @endif
        </div>
        <!-- ========================================= CONTENT : END ========================================= -->

        <!-- ========================================= SIDEBAR ========================================= -->
        <div class="col-xs-12 col-md-3 no-margin sidebar">
            <div class="widget cart-summary">
                <h1 class="border">Корзина</h1>
                <div class="body">
                    <ul id="total-price" class="tabled-data inverse-bold no-border">
                        <li>
                            <label>итого</label>
                            <div class="value pull-right"><span>{{ Cart::total() }}</span> {{ $currency }}</div>
                        </li>
                    </ul>
                    <div class="buttons-holder">
                        @if( !$cart->isEmpty() )
                        <a class="le-button big cart-btn" href="/checkout" >Оформить заказ</a>
                        @endif
                        <a class="le-button big cart-btn" href="/" >Продолжить покупки</a>
                    </div>
                </div>
            </div><!-- /.widget -->
        </div><!-- /.sidebar -->
        <!-- ========================================= SIDEBAR : END ========================================= -->
    </div>
</section>
@stop
