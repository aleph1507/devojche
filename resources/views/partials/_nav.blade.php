<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="bsnav" style="margin-bottom:1%;" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" style="padding-bottom: 1%;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"  href="/"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    {{-- <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Категорија
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Cat 1</a></li>
                        <li><a href="#">Cat 2</a></li>
                        <li><a href="#">Cat 3</a></li>
                    </ul>
                    </li> --}}

                    @if(Auth::check())
                        <li>
                            <a href="{{route('admin.index')}}">Администраторски Панел</a>
                        </li>
                        @if(Auth::user()->seller == NULL)
                            <li>
                                <a href="{{ route('seller.create') }}">Продавај преку нас</a>
                            </li>
                        @else
                            <li>
                                <a href="{{route('seller.index')}}">Вашата продавница</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Одјави се</a>
                        </li>
                    @else
                        <li>
                            <a href="/login">Најави се</a>
                        </li>
                        <li>
                            <a href="/register">Регистрирај се</a>
                        </li>
                    @endif
                    <li>
                        <a href="/contact">Контакт</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>