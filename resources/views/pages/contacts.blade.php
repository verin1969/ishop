@extends('layouts.layout')
@section('content')
<!-- ========================================= MAIN ========================================= -->
    <main id="contact-us" class="inner-bottom-md">
        <section class="google-map map-holder">
            <div id="map" class="map center"></div>
            <input name="zoom" type="hidden" value="{{ config('setting.zoom','0') }}">
            <input name="latitude" type="hidden" value="{{ config('setting.latitude','0') }}">
            <input name="longitude" type="hidden" value="{{ config('setting.longitude','0') }}">
        </section>

        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <section class="section leave-a-message">
                        <h2 class="bordered">Наши контакты</h2>
                        <form id="contact-form" class="contact-form cf-style-1 inner-top-xs" method="post" action="{{ asset('/contacts/send') }}">
                        {{ csrf_field() }}
                        <h2 class="bordered">Вы можете оставить сообщение для нас</h2>
                            <div class="row field-row"><br>
                                <div class="col-xs-12 col-sm-6">
                                    {{ Form::label('fullname', 'Ваше имя', ['class' => 'control-label']) }}
                                    {{ Form::text('fullname', '', ['class' => 'form-control', 'placeholder' => 'Иван Иванов']) }}
                                    @if($errors->has('fullname'))
                                        {{ Form::label('fullname', $errors->first('fullname'), ['class' => 'error']) }}
                                    @endif
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    {{ Form::label('email', 'Ваш Email', ['class' => 'control-label']) }}
                                    {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'user@mail.ru']) }}
                                    @if($errors->has('email'))
                                        {{ Form::label('email', $errors->first('email'), ['class' => 'error']) }}
                                    @endif
                                </div>
                            </div><!-- /.field-row -->

                            <div class="field-row">
                                {{ Form::label('theme', 'Тема', ['class' => 'control-label']) }}
                                {{ Form::text('theme', '', ['class' => 'form-control', 'placeholder' => 'Тема обращения']) }}
                                @if($errors->has('theme'))
                                    {{ Form::label('theme', $errors->first('theme'), ['class' => 'error']) }}
                                @endif
                            </div><!-- /.field-row -->

                            <div class="field-row">
                                {{ Form::label('message', 'Ваше сообщение', ['class' => 'control-label']) }}
                                {{ Form::textarea('message', '', ['size' => '50x3', 'class' => 'form-control']) }}
                                @if($errors->has('message'))
                                    {{ Form::label('message', $errors->first('message'), ['class' => 'error']) }}
                                @endif
                            </div><!-- /.field-row -->
                            <div class="buttons-holder">
                                <button type="submit" class="le-button huge">Отправить</button>
                            </div><!-- /.buttons-holder -->
                        </form><!-- /.contact-form -->
                    </section><!-- /.leave-a-message -->
                </div><!-- /.col -->

                <div class="col-md-4">
                    <section class="our-store section inner-left-xs">
                        <h2 class="bordered">Наш магазин</h2>
                        <address>
                            {{ config('setting.address','Moscow') }}<br>
                            Т. {{ config('setting.phone','+7999-777-99-77') }}
                        </address>
                        <h2 class="bordered">Режим работы</h2>
                        <address>
                            {!! config('setting.mode','Круглосуточно') !!}
                        </address>
                    </section><!-- /.our-store -->
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </main>
<!-- ========================================= MAIN : END ========================================= -->
@stop