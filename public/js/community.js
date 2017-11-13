function invite() {
    $('#invite-modal').modal('show');
}

String.prototype.trunc = String.prototype.trunc ||
    function (n) {
        return (this.length > n) ? this.substr(0, n - 1) + '&hellip;' : this;
    };

var nextUrl = ""

function findGetParameter(parameterName) {
    var result = null,
        tmp = [];
    location.search
        .substr(1)
        .split("&")
        .forEach(function (item) {
            tmp = item.split("=");
            if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        });
    return result;
}

var filter = null;
$(document).ready(function () {
    ;
    $('#invite-id').hide();
    $("#invite-save").submit(function (e) {
        $.post(window.location.pathname + "/invite", $("#invite-save").serialize(), function (data) {
            $('#invite-id a').attr('href', data)
                .text(data)
                .show();
            $('#invite-id').show();
        });
        e.preventDefault();
    });

    filter = findGetParameter('filter');

    nextUrl = "http://localhost/community/1/post";
    if(filter != null){
        nextUrl += "?filter="+encodeURIComponent(filter);
    }
    loadMore()
});

function loadMore() {
    $('#post-load-more').hide();
    $.getJSON(nextUrl,
        function (page) {
            page.data.forEach(function (post) {
                var commentCount = '<span class="badge">0</span>';
                if (post.comment_count != null) {
                    commentCount = '<span class="badge">'+post.comment_count.count+'</span>'
                }
                $('#post-list').append('<div class="col-sm-4">' +
                    '<div class="panel panel-default">' +
                    '<div class="panel-body">' +
                    '<a href="/community/' + post.community + '/post/' + post.id + '"><h4>' + post.title + ' ' + commentCount + '</h4></a>' +
                    '<p class="card-text">' + post.content.trunc(100) + '</p>' +
                    '<small class="text-muted pull-right">' + post.updated_at + '</small></div></div></div>'
                );
            });

            if (page.next_page_url != null) {
                $('#post-load-more').show();
            }
            nextUrl = page.next_page_url;
            if(filter != null){
                nextUrl += "&filter=" + encodeURIComponent(filter);
            }
        }
    );
}