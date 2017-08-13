//============================<< send csrf token is must !! >>================================================
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//============================<< start function that add post >>================================================

function createPost(){

    var form = document.getElementById('create-post');
    var request = new XMLHttpRequest();

    form.addEventListener('submit',function handler(e){
        e.currentTarget.removeEventListener(e.type, handler);
        //alert('postsssssssssssssssss');
        e.preventDefault();
        var formData = new FormData(form);
        request.open('post','upload');

        request.addEventListener("load",function load(k) {
            var jsonResult = JSON.parse(request.responseText);
            // alert(jsonResult["extention"]);
            //alert(jsonResult["id"]);

            if (jsonResult["postImage"] != " ") {

                if (jsonResult["extention"] == "mp4" || jsonResult["extention"] == "avi" || jsonResult["extention"] == "flv" || jsonResult["extention"] == "mpg") {

                    $("#currentPost").prepend('<div class="postsInfo TheNewPost" id="RemovePost_'+jsonResult["id"]+'"><div class="post"><div class="postHead"><div class="postHead--img"><img height="50" src="'+jsonResult["UserProfilePicture"]+'" style="border-radius:50%;"></div><div class="postHead--info"><p><font size="5" color="black">'+jsonResult["userfname"]+'</font><br>'+jsonResult["currentDate"]+'</p>    <div class="dropdown drop" style="margin-left: 435px;margin-top: -45px;"><button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="border: 0px"> <span class="glyphicon glyphicon-chevron-down"></span></button> <ul class="dropdown-menu">    <li><a href="#" onclick="return RemovePost('+jsonResult["id"]+')">Delete</a></li></ul></div></div><div class="clearfix"></div><div class="postHead--post"><br><p>'+jsonResult["PostDescription"]+'</p><br><video controls><source src="'+jsonResult["postImage"]+'" type="video/mp4"></video></div><hr> <div class="postHead--footer"> <div class="postHead--footer"> <button class="li_un"  onClick="fun_checklike(event)"value="'+jsonResult["id"]+'" id="btnFollow'+jsonResult["id"]+'"> <i class="fa fa-thumbs-up"></i>Like</button> </i> <button class="li_un" aria-controls="#view-comments-'+jsonResult["id"]+'"  type="button"  data-target="#view-comments-'+jsonResult["id"]+'" data-toggle="collapse" aria-expanded="false" > <i class="fa fa-comment"> &nbsp;Show Comments </i> </button> <span><i class="fa fa-share-alt"></i><a href="#" data-toggle="modal" data-target="#myModal2">Share</a></span> <form  action="#"  method="POST" autocomplete="on" id="create-comment-'+jsonResult["id"]+'" enctype="multipart/form-data"> <input type="hidden" name="_token" value="{{ csrf_token() }}"> <input type="hidden" name="PostID" id="PostID" value="'+jsonResult["id"]+'"> <textarea required id="commentDescription" class="form-control text_comment"  name="commentDescription" cols="30" rows="1" placeholder="Write your comment here...." style="outline:0"></textarea> <input type="submit" onclick="return createcomment('+jsonResult["id"]+')" value="Add comment" class="crud-submit btn btn-info" id="CommentButton"style=" margin-bottom:1%;height: 36px;border: none;background: #ff6633; float:right;margin-top:2%;width:25%"/> </form> <div class="clearfix"></div> <div class="collapse com"  id="view-comments-'+jsonResult["id"]+'" style="padding-bottom:1%; padding-top:1%;overflow:hidden"></div> </div> </div> </div> </div></div>');                }else{




                    $("#currentPost").prepend('<div class="postsInfo TheNewPost" id="RemovePost_'+jsonResult["id"]+'"><div class="post"><div class="postHead"><div class="postHead--img"><img height="50" src="'+jsonResult["UserProfilePicture"]+'" style="border-radius:50%;"></div><div class="postHead--info"><p><font size="5" color="black">'+jsonResult["userfname"]+'</font><br>'+jsonResult["currentDate"]+'</p>    <div class="dropdown drop" style="margin-left: 435px;margin-top: -45px;"><button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="border: 0px"> <span class="glyphicon glyphicon-chevron-down"></span></button> <ul class="dropdown-menu">   <li><a href="#" onclick="return RemovePost('+jsonResult["id"]+')">Delete</a></li></ul></div></div><div class="clearfix"></div><div class="postHead--post"><br><p>'+jsonResult["PostDescription"]+'</p><br><center><img src="'+jsonResult["postImage"]+'" style="max-width:550px; max-height: 400px;"></center></div><hr><div class="postHead--footer"> <div class="postHead--footer"> <button class="li_un"  onClick="fun_checklike(event)"value="'+jsonResult["id"]+'" id="btnFollow'+jsonResult["id"]+'"> <i class="fa fa-thumbs-up"></i>Like</button> </i> <button class="li_un" aria-controls="#view-comments-'+jsonResult["id"]+'"  type="button"  data-target="#view-comments-'+jsonResult["id"]+'" data-toggle="collapse" aria-expanded="false" > <i class="fa fa-comment"> &nbsp;Show Comments </i> </button> <span><i class="fa fa-share-alt"></i><a href="#" data-toggle="modal" data-target="#myModal2">Share</a></span> <form  action="#"  method="POST" autocomplete="on" id="create-comment-'+jsonResult["id"]+'" enctype="multipart/form-data"> <input type="hidden" name="_token" value="{{ csrf_token() }}"> <input type="hidden" name="PostID" id="PostID" value="'+jsonResult["id"]+'"> <textarea required id="commentDescription" class="form-control text_comment"  name="commentDescription" cols="30" rows="1" placeholder="Write your comment here...." style="outline:0"></textarea> <input type="submit" onclick="return createcomment('+jsonResult["id"]+')" value="Add comment" class="crud-submit btn btn-info" id="CommentButton"style=" margin-bottom:1%;height: 36px;border: none;background: #ff6633; float:right;margin-top:2%;width:25%"/> </form> <div class="clearfix"></div> <div class="collapse com"  id="view-comments-'+jsonResult["id"]+'" style="padding-bottom:1%; padding-top:1%;overflow:hidden"></div> </div> </div></div> </div></div>');                }

            }else{


                $("#currentPost").prepend('<div class="postsInfo TheNewPost" id="RemovePost_'+jsonResult["id"]+'"><div class="post"><div class="postHead"><div class="postHead--img"><img height="50" src="'+jsonResult["UserProfilePicture"]+'" style="border-radius:50%;"></div><div class="postHead--info"><p><font size="5" color="black">'+jsonResult["userfname"]+'</font><br>'+jsonResult["currentDate"]+'</p>        <div class="dropdown drop" style="margin-left: 435px;margin-top: -45px;">   <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="border: 0px">  <span class="glyphicon glyphicon-chevron-down"></span></button> <ul class="dropdown-menu">  <li><a href="#" onclick="return RemovePost('+jsonResult["id"]+')">Delete</a></li></ul></div></div><div class="clearfix"></div><div class="postHead--post"><br><p>'+jsonResult["PostDescription"]+'</p><br></div><hr> <div class="postHead--footer"> <div class="postHead--footer"> <button  class="li_un"  onClick="fun_checklike(event)"value="'+jsonResult["id"]+'" id="btnFollow'+jsonResult["id"]+'"> <i class="fa fa-thumbs-up"></i>Like</button> </i> <button class="li_un" aria-controls="#view-comments-'+jsonResult["id"]+'"  type="button"  data-target="#view-comments-'+jsonResult["id"]+'" data-toggle="collapse" aria-expanded="false" > <i class="fa fa-comment"> &nbsp;Show Comments </i> </button> <span><i class="fa fa-share-alt"></i><a href="#" data-toggle="modal" data-target="#myModal2">Share</a></span> <form  action="#"  method="POST" autocomplete="on" id="create-comment-'+jsonResult["id"]+'" enctype="multipart/form-data"> <input type="hidden" name="_token" value="{{ csrf_token() }}"> <input type="hidden" name="PostID" id="PostID" value="'+jsonResult["id"]+'"> <textarea required id="commentDescription" class="form-control text_comment"  name="commentDescription" cols="30" rows="1" placeholder="Write your comment here...." style="outline:0"></textarea> <input type="submit" onclick="return createcomment('+jsonResult["id"]+')" value="Add comment" class="crud-submit btn btn-info" id="CommentButton"style=" margin-bottom:1%;height: 36px;border: none;background: #ff6633; float:right;margin-top:2%;width:25%"/> </form> <div class="clearfix"></div> <div class="collapse com"  id="view-comments-'+jsonResult["id"]+'" style="padding-bottom:1%; padding-top:1%;overflow:hidden"></div> </div> </div></div></div></div>');             }


            $("#PostDescription").val('');
            $("#postImage").val('');

        }, false);

        request.send(formData);

    },false);

}

//===============================<< End function that add post >>===================================================

//===============================<< start function that add event >>================================================
function create_Event(){

    var form = document.getElementById('create-event');
    var request = new XMLHttpRequest();
    //alert('eventsssssssssssssssss');
    form.addEventListener('submit',function handler(e){
        e.currentTarget.removeEventListener(e.type, handler);
        e.preventDefault();
        var formData = new FormData(form);
        request.open('post','CreateEvent');

        request.addEventListener("load",function load(event) {

            // var jsonResult = JSON.parse(request.responseText);
            // if (jsonResult["postImage"] != " ") {
            //     $("#currentEvent").prepend('<div class="Event--cap col-lg-5"><div class="Event--img"><img src="'+jsonResult["Image"]+'"  style="width:100px; height: 100px;" alt=""></div><div class="Event--info"><h4>'+jsonResult["Event_name"]+'</h4><p>Start :'+jsonResult["EventStartDate"]+' </p><p> End :'+jsonResult["EventEndDate"]+' </p><p>'+jsonResult["EventDescription"]+'</p><button onclick="" value="" id="">Going</button></div></div><br>');
            // } else {
            //     $("#currentEvent").prepend('<div class="Event--cap col-lg-5"><div class="Event--img"><img src="'+jsonResult["Image"]+'"  style="width:100px; height: 100px;" alt=""></div><div class="Event--info"><h4>'+jsonResult["Event_name"]+'</h4><p>Start :'+jsonResult["EventStartDate"]+' </p><p> End :'+jsonResult["EventEndDate"]+' </p><p>'+jsonResult["EventDescription"]+'</p><button onclick="" value="" id="">Going</button></div></div><br>');
            // }
            // $("#Event_name").val('');
            // $("#EventDescription").val('');
            // $("#EventStartDate").val('');
            // $("#EventEndDate").val('');
            // $("#EventTypeID").val('');
            // $("#image").val('');
            //alert(request.responseText);

            $('.TheEvent').slideUp("slow");
            $('.TheEvent').html("<p style='color:#f63;'> Event added successfully !! </p>").slideDown("slow");

            window.setTimeout(function(){ window.location = URL+"/Events"; },2000);


        }, false);

        request.send(formData);

    },false);

}
//============================<< End function that add event >>================================================

function RemovePost(Post_ID){


    $.ajax({

        type:'get',
        url :'RemovePost/'+Post_ID,
        dataType: 'json',
        success: function(response){
            //alert('ffff');
            $("#RemovePost_"+response).stop( true, true ).fadeOut();
        }

    });

    return false;
}



//============================<< start function that add comment >>================================================


function createcomment(Post_ID){


    var form = document.getElementById('create-comment-'+Post_ID);
    var request = new XMLHttpRequest();

    form.addEventListener('submit',function handler(e){
        e.currentTarget.removeEventListener(e.type, handler);

        e.preventDefault();
        var formData = new FormData(form);
        request.open('post','add_comment');

        request.addEventListener("load",function load(k) {
            var jsonResult = JSON.parse(request.responseText);




            $("#view-comments-"+Post_ID).prepend('<div class="TheComments"> <div class="left_info left_info--com"> <div class="img_name"> <img src="'+jsonResult["UserProfilePicture"]+'" alt="" width="70px"height="50px"> </div> <p>'+jsonResult["UserFirstName"]+'</p> </div> <div class="right_info" style="margin-top:5px">'+jsonResult["Content"]+' </div> </div> <div class="clearfix"></div>');

            $("#commentDescription").val('');


        }, false);

        request.send(formData);

    },false);}

//===============================<< End function that add comment >>===================================================



//===============================<< start function that report post  >>===================================================

$(document).on('click', '#report-modal', function() {

    $('#pid').val($(this).data('id'));

});
$('#savebutton').on('click', function() {

    $.ajax({

        type: 'post',
        url: 'reportpost',
        data: {

            'id': $("#pid").val(),

            'typeId': $('[name="ReportTypeId"]').val(),







        },
        success: function(data) {
        }
    });
});
//===============================<< End function that report post  >>===================================================













