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

    <link rel="stylesheet" href="/css/main.css">
</head>
<body>

@include('templates.navbar')


<div class="form-signin vertical-center">
    <div class="container">

        @include('templates.errors')

        <div class="panel panel-default">
            <div class="panel-heading">Welcome back!</div>
            <div class="panel-body">
                <form action="{{ url('/join') }}">
                    <label>Join community</label>
                    <div class="input-group">
                        <input type="text" name="invite" class="form-control" placeholder="Invite code">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-plus"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <hr/>
                <form action="{{ url('/restore') }}" method="post">
                    {{ csrf_field() }}
                    <label>Resume session</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="code" placeholder="Session code">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-log-in"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Create community</div>
            <div class="panel-body">
                <form action="{{ url('/create') }}" method="post">
                    {{ csrf_field() }}
                    <label>Create community</label>
                    <div class="input-group">
                        <input type="text" name="name" class="form-control" placeholder="Community name">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-plus"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
