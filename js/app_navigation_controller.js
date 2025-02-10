$(function () {
    $(document).ready(function(){
        var user_link_request = ''; 
        $.post('controller/app_navigation_controller.php',{
            user_link_request: user_link_request
        },function(data) {  
            $('#app_content').html(data);
        });
    });
});