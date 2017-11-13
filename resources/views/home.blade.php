<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $community->name }} - Anno-Community</title>
    <!-- Latest compiled JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ url('/css/main.css') }}">
</head>
<body>

@include('templates.navbar')

<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading">Community - {{ $community->name }}</div>
                <div class="panel-body">

                    @if(isset($stats))
                        <ul class="list-group">
                            @foreach($stats as $stat)
                                <li class="list-group-item"><b>{{ $stat['key'] }}</b>: {{ $stat['value'] }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="btn-group btn-group-justified" style="margin-bottom: 5px;">
                        <a href="{{ url('/community/'.$community->id.'/leave') }}" class="btn btn-danger">Leave</a>
                        <a onclick="invite()" class="btn btn-primary">Invite</a>
                    </div>
                    <a href="#" class="btn btn-primary btn-block">Create Post</a>


                </div>
            </div>
        </div>
        <div class="col-sm-9">
            @include('templates.errors')
            <div class="panel panel-default">
                <div class="panel-heading">
                    Posts
                    <form action="{{ url('/community/'.$community->id) }}">
                        <div class="input-group">
                            <input type="text" name="filter" class="form-control" value="{{ $filter }}" placeholder="Filter">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-filter"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-body">
                    <div id="post-list" class="row">

                    </div>
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-5">
                            <button id="post-load-more" onclick="loadMore()" type="button" class="btn">Load more</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="invite-modal" role="dialog">
        <div class="modal-dialog modal-sm vertical-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Invite</h4>
                </div>
                <div class="modal-body">
                    <p>Invite people to this community.</p>
                    <p>This invite will expire after:</p>

                    <form id="invite-save">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $community->id }}" id="invite-community-id">
                        <div class="input-group" style="margin-bottom: 5px;">
                            <select class="form-control" name="expire">
                                <option selected value="86400">1 day</option>
                                <option value="259200">3 days</option>
                                <option value="604800">7 days</option>
                                <option value="2592000">30 days</option>
                                <option value="5184000">60 days</option>
                                <option value="7776000">90 days</option>
                                <option value="31536000">365 days</option>
                            </select>
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-plus"></i>
                                </button>
                            </div>
                        </div>
                        <input type="hidden" name="url">
                    </form>

                    <div id="invite-id" class="well well-sm text-center ">
                        <a class="text-muted"></a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<script src="{{ url('/js/community.js') }}"></script>

</body>
</html>
