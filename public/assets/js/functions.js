

function customMsg(msg, type = 'danger'){
    return '<p class ="alert alert-' + type +'">'+ msg +'<button class="close" data-dismiss="alert">&times;</button></p>';
}


// All Student Feature
allStudent()
function allStudent(){

    $.ajax({
        url : 'student/all',
        success: function (data){
            $('#allStudent').html(data);
            
        }
    });
}

