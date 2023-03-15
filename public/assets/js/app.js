/*
    Author: Iván López
*/
$(document).ready(function () {
    if ($('#home-post-list').length > 0) {
        $.get('/api/list?' + new Date().getTime(), function (data) {
            var jsonData = data;
            $(jsonData).each(function(k, v) {
                $('#home-post-list').append(buildPostItem(v));
            });
            
        });
    }

    if ($('#post-detail').length > 0) {
        $.get('/api/item/' + postId + '?' + new Date().getTime(), function (data) {
            var jsonData = data;
            $(jsonData).each(function(k, v) {
                $('#post-detail #post-title label').text(v.title);
                $('#post-detail #author p').html(
                    '<p>Author: ' + v.user.user_name + '</p>'
                    + '<p> Location: ' + v.user.address.city + '</p>'
                    + '<p> Email: ' + v.user.email + '</p>'
                    + '<p> Company: ' + v.user.company.name + '</p>'
                    );
                $('#post-detail #body p').text(v.body);
            });
            
        });
    }

    $('[name="post_form"]').submit(function(e) {
        var $form = $(e.currentTarget);
            
        $.ajax({
            type: "POST",
            url: $form.attr('action') + '?' + new Date().getTime(),
            data: $form.serialize(),
            success: function(response) {
                if (response.code == 200) {
                    alert(response.message);
                } else {
                    var errors_txt = getErrorsFromResponse(response);
                    alert(errors_txt);
                }
            },
            error: function(response) {
                var errors_txt = getErrorsFromResponse(response);
                alert(errors_txt);
            }
        });

        return pevent(e);
    });

});

function buildPostItem(v) {
    return '<div class="post-item mb-5">'
        + '<h3 class="text-2xl mb-3">#' + v.id + ' ' + v.title + '</h3>'
        + '<p class="author"><label>Author: ' + v.user.user_name + ' (' + v.user.address.city + ')</label></p>'
        + '<div class="body"><p>' + v.body.substring(0, 50) + '...</p></div>'
        + '<div><a href="/viewPost/' + v.id + '">Read more</button></div>'
        + '</div>';
}

function getErrorsFromResponse(response) {
    var errorObj = response.responseJSON ?? response;
    var error_txt = errorObj.message + '\r\n';

    for (var item in errorObj.errors.children) {
        var err = errorObj.errors.children[item];
        if ($(err?.errors).length > 0) {
            error_txt += item + ': ' + err.errors[0] + '\r\n';
        }
    }

    return error_txt;
}

function pevent(event)
{
    event.stopPropagation();
    event.preventDefault();

    return false;
}