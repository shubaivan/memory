$(document).on('submit', '#comment_add', function(e){
    e.preventDefault();

    var data = $(this).serialize();

    $(this).find('input[type=text]').val("");
    $(this).find('textarea').val("");

    $.ajax({
        url: $(this).attr("action"),
        type: $(this).attr("method"),
        data: data
    }).done(function(data){
        console.log(data);

        html = "";
        for(var i = data.length - 1; i >= 0 ; i--){
            html +=
            "<li>"+
            "<small class='text-muted'>"+
             data[i].createdAt + "</br>"+
             data[i].text + "</b>"+
            "</small>"+
            "</li>";
        }

        $('#category_list').html(html);
    });
});


$(document).on('click', '#delete_post', function(e){
    e.preventDefault();

    $.ajax({
        url: $(this).attr('href'),
        type: 'DELETE'
    }).done(function(data, status){
        document.location.href = "/";
    });
});
