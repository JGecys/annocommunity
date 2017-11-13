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

@include('templates.navbar')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>{{ $post->title }}</h4>
            <br>
            <small class="text-muted"><i>{{ $post->created_at }}</i> by <a
                        href="#{{ $post->created_by }}">{{ $post->user->name }}</a></small>
        </div>
        <div class="panel-body">
            <p>
                {{ $post->content }}
            </p>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Comments</div>
        <div class="panel-body">
            @each('templates.comment', $post->comments, 'comment', 'templates.no_comments')
            <form id="comment_form" action="{{ url('/community/'.$community->id.'/post/'.$post->id.'/comment') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="reply_to" id="reply_to">
                <div class="form-group">
                    <label for="comment">Write a comment:</label>
                    <a id="reply_label" style="display: none;" href="#" onclick="replyTo(-1, '');"><span id="reply_name" class="label label-default">Reply to: Anno-512358432</span></a>
                    <textarea name="comment" class="form-control" rows="5" style="width: 100%; min-width:100%; max-width:100%; min-height: 50px" id="comment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Comment</button>
            </form>
        </div>
    </div>
</div>

<script type="application/javascript">
    function replyTo(id, name){
        $('#reply_to').val(id);
        var replyLabel = $('#reply_label');
        var replyToName = $('#reply_name');
        if(id == -1) {
            replyLabel.hide();
        } else {
            replyToName.text('Reply to: ' + name);
            replyLabel.show();
            $('html, body').animate({
                scrollTop: $("#comment_form").offset().top
            }, 500);
        }
    }
</script>

</body>
</html>
