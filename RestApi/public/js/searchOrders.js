$('#search').focus();

$('#searchOrdersForm').submit(function(evt){ 
    evt.preventDefault();
    searchFunction();
});
$('#submitSearchOrdersForm').click(function(evt){ 
    evt.preventDefault();   
    searchFunction();
});

function searchFunction()
{
    search = $('#search').val();

    url = '/orders/search/'+search;

    $.get(url, function( data ) {
        $('#tableBody').html(data);
    });

    $('#search').focus();
}