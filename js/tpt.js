/*
 * 20140723
 * prawee@hotmail.com
 */
jQuery(document).ready(function() {    
    $('#changeStatus').click(function(){
        var id=$("#grid-request").yiiGridView('getSelectedRows');
        if(id.length){
            window.location.href='change-status?id='+id;
        }
    });
});

