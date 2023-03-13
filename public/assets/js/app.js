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
                $('#post-detail #author p').text(
                    'Author: ' + v.user.user_name
                    + ' (' + v.user.address.city + ')'
                    + ' - Email: ' + v.user.email + ''
                    + ' - Company: ' + v.user.company.name + ''
                    );
                $('#post-detail #body p').text(v.body);
            });
            
        });
    }

    $('DISABLED[name="post_form"]').submit(function(e) {
        var $form = $(e.currentTarget);

        $.post($form.attr('action') + '?' + new Date().getTime(), $form.serialize(), function (data) {

            if (data[1]?.errors[0]) {
                alert("Error: " + data[1].errors[0]);
            } else {
                alert("Post sent successfully.");
            }
        });

        return pevent(e);
    });

    $('[name="post_form"]').submit(function(e) {
        var $form = $(e.currentTarget);
            
        $.ajax({
            type: "POST",
            url: $form.attr('action') + '?' + new Date().getTime(),
            data: $form.serialize(),
            success: function(response) {
                alert(response.result);
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
    return '<div class="post-item">'
        + '<h3 class="title">#' + v.id + ' ' + v.title + '</div>'
        + '<p class="author"><label>Author: ' + v.user.user_name + ' (' + v.user.address.city + ')</label></p>'
        + '<div class="body"><p>' + v.body.substring(0, 50) + '...</p></div>'
        + '<div><a href="/viewPost/' + v.id + '">Read more</button></div>'
        + '</div>';
}

function getErrorsFromResponse(response) {
    var error_txt = response.responseJSON.message + '\r\n';

    for (var item in response.responseJSON.errors.children) {
        var err = response.responseJSON.errors.children[item];
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