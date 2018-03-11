@extends('layouts.layout')
@section('content')
<section id="category-grid">
    <div class="container">     
        <div class="col-xs-12 col-sm-9 no-margin wide sidebar">
            <section id="gaming">
                <div class="grid-list-products">
                    <h2 class="section-title">{{ $text }}</h2>
                    <div class="tab-content">
                        <div id="list-view" class="products-grid fade tab-pane in active">
                            <div class="products-list">
                            @if ($products->count() != 0)
                                @foreach($products  as $product)
                                <div class="product-item product-item-holder">
                                    <!--div class="ribbon red"><span>sale</span></div> 
                                    <div class="ribbon blue"><span>new!</span></div-->
                                    <div class="row">
                                        <div class="no-margin col-xs-12 col-sm-4 image-holder">
                                            <div class="image">
                                                <img alt="" src="/upload/products/{{ $product->image}}" width="180" height="180"/>
                                            </div>
                                        </div><!-- /.image-holder -->
                                        <div class="no-margin col-xs-12 col-sm-5 body-holder">
                                            <div class="body">
                                                <div class="title">
                                                    <a href="/product/{{ $product->id}}">{{ $product->name }}</a>
                                                </div>
                                                <div class="excerpt">
                                                    {{ strip_tags($product->description) }}
                                                </div>
                                            </div>
                                        </div><!-- /.body-holder -->
                                        <div class="no-margin col-xs-12 col-sm-3 price-area">
                                            <div class="right-clmn add-cart-button">
                                                @if ($product->stock != 0)
                                                    <div class="price-current"><span>{{ $product->price }}</span> {{ $currency }}</div>
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <a class="le-button" href="#">В корзину</a>
                                                @else
                                                   <div class="price-current"><span>Нет на складе</span></div>
                                                @endif
                                            </div>
                                        </div><!-- /.price-area -->
                                    </div><!-- /.row -->
                                </div><!-- /.product-item -->
                                @endforeach
                            @else
                                <div class="container">
                                    <div class="row input-form">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Внимание</div>

                                                <div class="panel-body">
                                                    Информация о продуктах не найдена!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            </div><!-- /.products-list -->
                        </div><!-- /.products-grid #list-view -->
                    </div><!-- /.tab-content -->
                 </div><!-- /.grid-list-products -->
            </section><!-- /#gaming -->            
        </div><!-- /.col -->
        <!-- ========================================= CONTENT : END ========================================= -->    
    </div><!-- /.container -->
</section><!-- /#category-grid -->
@stop