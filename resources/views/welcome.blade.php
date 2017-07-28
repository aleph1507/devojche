@extends('layouts.master')

@section('content')

    <!-- Page Content -->
    <div class="container">

        <div class="row cat-row">

                <p class="lead title"><b>Jewel пазар</b></p>
                <div class="div_kategorii" id="div_kategorii">
                    <br>
                    <button class="btn btn-default btn-inverted-default hidden-md hidden-lg btn-kategorii" id="btn_kategorii">Види Категории</button>
                    <ul class="nav nav-pills nav-justified kategorii" id="pil_kategorii">
                        <li class="cat-pill {{ isset($id) ? '' : 'active'}}"><a href="/">Сите</a></li>
                        {{-- @foreach($categories as $cat) --}}
                        <?php $k = 0; ?>
                        @for($i=0;$i<count($categories);$i++)
                            @if($i % 4 == 0)
                                <div class="row"></div>
                            @endif
                            <?php $k++; ?>    
                            <li class="cat-pill {{isset($id) && $categories[$i]->id == $id ? 'active' : ''}}"><a href="{{route('welcome.category', $categories[$i]->id)}}">{{$categories[$i]->ime}}</a></li>
                        @endfor
                        {{-- @endforeach --}}
                    </ul>
                </div>

                {{-- <div class="categories hidden-xs col-md-12 col-lg-12">
                    @foreach($categories as $cat)
                        <a href="#" class="btn btn-default col-xs-12 col-sm-6 col-md-4 col-lg-2">
                            {{$cat->ime}}
                        </a>
                    @endforeach
                    
                </div> --}}
            <!-- </div> -->

        </div>

        @if(count($products) > 0)
            <section class="products">
                @include('partials._products')
            </section>
        @else
            <div class="nop">
                <h2 class="nop">Моментално нема продукти во оваа категорија.</h2>
            </div>
        @endif



       {{--  <div class="row">

            <div class="col-md-12">

                <!-- <div class="row"> -->

                    <div class="lazy-container col-sm-12 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <!-- <img src="http://placehold.it/320x150" alt=""> -->
                            <!-- <div class="col-md-12"> -->
                        <div id="carousel-p1" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-p1" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-p1" data-slide-to="1"></li>
                                <li data-target="#carousel-p1" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/320x150" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/320x150" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/320x150" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-p1" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-p1" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    <!-- </div> -->
                    <!-------------- -->
                            <div class="caption">
                                <h4 class="pull-right">$24.99</h4>
                                <h4><a href="#">First Product</a>
                                </h4>
                                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$64.99</h4>
                                <h4><a href="#">Second Product</a>
                                </h4>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">12 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$74.99</h4>
                                <h4><a href="#">Third Product</a>
                                </h4>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">31 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$84.99</h4>
                                <h4><a href="#">Fourth Product</a>
                                </h4>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">6 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$94.99</h4>
                                <h4><a href="#">Fifth Product</a>
                                </h4>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">18 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>


                <!-- </div> -->

            </div> <!--  col 9 -->

            </div> <!-- row 9 --> --}}

    </div>
    <!-- /.container -->
         {{-- <script type="text/javascript">

            $(document).ready(function() {
                var wf = ($(window).height()/8), d = "";
                var pg = 3, done=false, count=1;
                $(window).scroll(function(){
                    if(done==false){
                        // alert("done: " + done);
                        if($(window).scrollTop() + $(window).height() >= ($(document).height() - wf)){
                            $('#load a').css('color', '#dfecf6');
                            $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

                            // var url = $(this).attr('href');
                            var dat = "", odat;
                            var url = '?page=' + pg;
                            // var d = setTimeout(getProducts(url), 2000);
                            dat = getProducts(url);
                            // alert("dat: " + dat);
                            if(dat != ""){
                                if(dat != odat)
                                    $('.products').append(dat);
                            }
                            dat = "";
                            d="";
                            // alert(getProducts(url), 2000);
                            // if(d != "")
                                // $('.products').append(d);
                            // alert(d);
                            // alert(url);
                            // window.history.pushState("", "", url);
                            //alert(url);
                        }
                    }
                });

                function getProducts(url) {
                    //alert("vo getProducts");
                    // d = "";
                    $.ajax({
                        url : url,
                        timeout:2000
                    }).done(function (data) {
                        if(data==0)
                            done=true;
                        else{
                            // alert("data: " + data);
                            d = "";
                            d = data;
                            // alert("d: " + d);
                            //$('.products').append(data);
                            pg++;
                        }
                        
                        // timeout(500) 
                    }).fail(function () {
                        // $('.products').append('Неуспешно преземање на продукти.');
                        setTimeout(function(){}, 1000);
                        pg--;
                    });
                    return d;
                }
            });

        </script> --}}
@endsection