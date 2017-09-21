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
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Anno-Community</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span></a></li>
        </ul>
    </div>
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#community_1">Community 1</a></li>
            <li><a href="#community_2">Community 2</a></li>
            <li><a href="#community_3">Community 3</a></li>
            <li><a href="#community_4">Community 4</a></li>
            <li><a href="#community_5">Community 5</a></li>
            <li><a href="#community_6">Community 6</a></li>
            <li><a href="#community_7">Community 7</a></li>
            <li><a href="#community_8">Community 8</a></li>
            <li><a href="#community_9">Community 9</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Community - {{ $id }}</div>
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a href="/community/{{ $id }}/post/1"><h4>Card title</h4></a>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#">Card link</a>
                            <a href="#">Another link</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a href="/community/{{ $id }}/post/1"><h4>Card title</h4></a>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#">Card link</a>
                            <a href="#">Another link</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a href="/community/{{ $id }}/post/1"><h4>Card title</h4></a>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#">Card link</a>
                            <a href="#">Another link</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a href="/community/{{ $id }}/post/1"><h4>Card title</h4></a>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#">Card link</a>
                            <a href="#">Another link</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a href="/community/{{ $id }}/post/1"><h4>Card title</h4></a>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#">Card link</a>
                            <a href="#">Another link</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a href="/community/{{ $id }}/post/1"><h4>Card title</h4></a>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#">Card link</a>
                            <a href="#">Another link</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 col-sm-offset-5">
                    <button type="button" class="btn">Load more</button>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
