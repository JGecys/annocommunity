<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Anno-Community</a>
        </div>
        @if(isset($user))
            <ul class="nav navbar-nav navbar-right">
                <li><a onclick="logout()"><span class="glyphicon glyphicon-log-out"></span></a></li>
            </ul>
        @endif
    </div>
    @if(isset($communities))
        <div class="container">
            <ul class="nav nav-tabs">
                @foreach($communities as $comm)
                    <li @if($comm->id == $community->id)class="active"@endif><a
                                href="{{ url('/community/'.$comm->id) }}">{{ $comm->name }}</a>
                    </li>
                @endforeach

                <li>
                    <a data-toggle="popover" data-title="Join community" data-placement="bottom" data-html="true"
                       data-content="<form style='width:200px;' action='{{ url('/join') }}'>
                    <div class='input-group'>
                        <input type='text' name='invite' class='form-control' placeholder='Invite code'>
                        <div class='input-group-btn'>
                            <button class='btn btn-default' type='submit'>
                                <i class='glyphicon glyphicon-plus'></i>
                            </button>
                        </div>
                    </div>
                    </form>"><span class="glyphicon glyphicon-plus"></span>
                    </a>
                </li>
            </ul>
        </div>
        <script>
            $(document).ready(function () {
                $('[data-toggle="popover"]').popover();
            });
        </script>
    @endif

</nav>


@include('templates.logout')

<script src="{{ url('/js/logout.js') }}"></script>