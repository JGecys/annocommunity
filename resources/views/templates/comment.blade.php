@if(!isset($comment->reply_to))
    <div class="media">
        <a href="#" class="media-left" data-toggle="collapse" data-target="#comment_{{ $comment->id }}">+</a>
        <div class="media-body">
            <h4 class="media-heading"><a href="#{{ $comment->user->id }}">{{ $comment->user->name }}</a>
                <small><i>{{ $comment->created_at }}</i></small>
            </h4>
            <p>{{ $comment->comment }}</p>
            <a href="#" onclick="replyTo('{{ $comment->id }}', '{{ $comment->user->name }}');"><small>Reply</small></a>
            <div id="comment_{{ $comment->id }}" class="collapse in">
                @each('templates.reply', $comment->replies, 'comment')
            </div>
        </div>
    </div>
    <hr/>
@endif