jQuery(document).ready(function($){
    $('.del_user_btn').on('click', function(e){
        e.preventDefault();
        let row = $(this);
        var u_id = row.data('id');
        console.log(u_id)
        var url = 'user_delete';
        $.ajax({
            type: "POST",
            url: url,
            data: { u_id:u_id }, 
            success: function( msg ) {
                if( msg.response == "success" ){
                    row.parent().parent().parent().fadeOut();
                } else {
                    alert('Error in deleting the record!');
                }
            }
        });
    });
});