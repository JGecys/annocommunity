<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anno-Community</title>
    <!-- Latest compiled JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ url('/css/main.css') }}">
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Anno-Community</a>
        </div>
        {{--<ul class="nav navbar-nav">--}}
        {{--<li class="active"><a href="#">Community #1</a></li>--}}
        {{--<li><a href="#">Community #2</a></li>--}}
        {{--</ul>--}}
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span></a></li>
        </ul>
    </div>
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#community">Community 1</a></li>
            <li><a href="#community">Community 2</a></li>
            <li><a href="#community">Community 3</a></li>
            <li><a href="#community">Community 4</a></li>
            <li><a href="#community">Community 5</a></li>
            <li><a href="#community">Community 6</a></li>
            <li><a href="#community">Community 7</a></li>
            <li><a href="#community">Community 8</a></li>
            <li><a href="#community">Community 9</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $post }}
            <br><small class="text-muted"><i>2017-09-29</i> by <a href="#anno">Anno-684532</a></small>
        </div>
        <div class="panel-body">

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut aliquet molestie tellus ac porttitor. Quisque
                at mollis augue. Vestibulum vulputate lacus eu sollicitudin gravida. Nullam posuere velit eget purus
                eleifend, nec vulputate odio tempor. Donec eget dignissim ipsum. In sodales cursus dapibus. Donec eu
                scelerisque nulla. Ut ultricies luctus dolor aliquet sollicitudin. Suspendisse potenti. Fusce a dolor
                metus. Nulla eleifend varius massa, vitae sagittis dolor bibendum et. Nullam viverra eros vel ligula
                feugiat, varius suscipit felis facilisis. Mauris at dignissim purus, at bibendum odio. Aenean consequat,
                elit a scelerisque aliquam, quam ipsum dignissim ex, ut finibus magna justo nec justo.
                <br>
                Curabitur egestas tellus eget leo pharetra, non auctor velit vestibulum. Curabitur vulputate tincidunt
                dui, eget dapibus odio mattis vitae. Quisque sodales felis elit, vitae pellentesque augue mattis et. Ut
                consectetur lectus odio, eget aliquet velit semper a. Cras vulputate hendrerit tortor, nec tincidunt
                erat ultrices vitae. Morbi consectetur accumsan enim, id ultrices augue iaculis eu. Cras mauris nibh,
                maximus in arcu id, vehicula lacinia elit. In faucibus dapibus urna quis interdum.
            </p>

        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading">Comments</div>
        <div class="panel-body">
            <div class="media">
                <div class="media-left">+</div>
                <div class="media-body">
                    <h4 class="media-heading">Anno-5486123 <small><i>2017-09-10</i></small></h4>
                    <p>Lorem ipsum...</p>
                    <hr />
                    <div class="media">
                        <div class="media-left">+</div>
                        <div class="media-body">
                            <h4 class="media-heading">Anno-854353213 <small><i>2017-09-10</i></small></h4>
                            <p>Lorem ipsum...</p>
                        </div>
                    </div>
                    <hr />
                    <div class="media">
                        <div class="media-left">+</div>
                        <div class="media-body">
                            <h4 class="media-heading">Anno-854353213 <small><i>2017-09-10</i></small></h4>
                            <p>Lorem ipsum...</p>
                            <hr />
                            <div class="media">
                                <div class="media-left">+</div>
                                <div class="media-body">
                                    <h4 class="media-heading">Anno-854353213 <small><i>2017-09-10</i></small></h4>
                                    <p>Lorem ipsum...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="media">
                <div class="media-left">+</div>
                <div class="media-body">
                    <h4 class="media-heading">Anno-45368312 <small><i>2017-09-10</i></small></h4>
                    <p>Lorem ipsum...</p>
                </div>
            </div>
            <hr />
            <div class="media">
                <div class="media-left">+</div>
                <div class="media-body">
                    <h4 class="media-heading">Anno-854353213 <small><i>2017-09-10</i></small></h4>
                    <p>Lorem ipsum...</p>
                </div>
            </div>
            <hr />
            <div class="media">
                <div class="media-left">+</div>
                <div class="media-body">
                    <h4 class="media-heading">Anno-43531235 <small><i>2017-09-10</i></small></h4>
                    <p>Lorem ipsum...</p>
                </div>
            </div>
            <hr />
            <div class="media">
                <div class="media-left">+</div>
                <div class="media-body">
                    <h4 class="media-heading">Anno-1538567213 <small><i>2017-09-10</i></small></h4>
                    <p>Lorem ipsum...</p>
                </div>
            </div>
        </div>
    </div>

</div>


</body>
</html>
