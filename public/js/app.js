
    function fun_checkClub(e)
  {
  e.preventDefault();
  var id=e.target.id;
  var clubId=e.target.value;
  var Url='http://localhost:/Be_Olympics/Check_club/';
  var delete_url='http://localhost:/Be_Olympics/DeleteFromClubFollowers';
  var insert_url='http://localhost:/Be_Olympics/addItem';
  var request = $.get( Url+clubId);
     request.done(function(response) {
     // console.log($(".result").html(response));
             var x=[];
             var z="";
                   for(var propt in response){
                 // console.log(propt + ': ' + response[propt]);
                  x[propt]=response[propt];
              }
              x.splice(0,2);
              z= x.join("");              
              if(z=="True")
              {
               // alert("true");
                $.ajax({
                url: delete_url,
                type:"POST", 
                data: {"id":clubId}

                }).done(function(){
                e.target.innerText=" Follow";


                });
              console.log(z);  
              }
              else
              {
                //alert("false");
                $.ajax({
                type: 'POST', // Type of response and matches what we said in the route
                url: insert_url, // This is the url we gave in the route
                data: {'id' : clubId}}).done(function(){
                e.target.innerText="Unfollow";
                });   
                   console.log(z);
               
                }
      
  //var x=$(this).val();


  });
  return false;

  }

  






  function fun_checKEvent(e)
  {
  e.preventDefault();
  var id=e.target.id;
  var eventId=e.target.value;
  var Url='http://localhost:/Be_Olympics/Check_EventUser/';
  var delete_url='http://localhost:/Be_Olympics/deleteEventUser';
  var insert_url='http://localhost:/Be_Olympics/addEventUser';

  var request = $.get( Url+eventId);

     request.done(function(response) {

          // console.log($(".result").html(response));
             var x=[];
             var z="";
                   for(var propt in response){
                 // console.log(propt + ': ' + response[propt]);
                  x[propt]=response[propt];
              }
              x.splice(0,2);
              z= x.join("");
              
              if(z=="True")
              {
               // alert("true");
                $.ajax({
                url: delete_url,
                type:"POST", 
                data: {"id":eventId}

                }).done(function(){
                e.target.innerText=" Going";


                });


              console.log(z);  
              }
              else
              {
                //alert("false");
                 $.ajax({
                type: 'POST', // Type of response and matches what we said in the route
                url: insert_url, // This is the url we gave in the route
                data: {'id' : eventId}}).done(function(){
                e.target.innerText="Not Going";
                });   
                   console.log(z);
               
                }
      
  //var x=$(this).val();


  });
  return false;

  }

  function fun_checkFollower(e)
  {
  e.preventDefault();
  var id=e.target.id;
  var userid=e.target.value;
  var Url='http://localhost:/Be_Olympics/check_follower/';
  var delete_url='http://localhost:/Be_Olympics/DeleteFollower';
  var insert_url='http://localhost:/Be_Olympics/addFollower';
  var request = $.get( Url+userid);
     request.done(function(response) {
     // console.log($(".result").html(response));
             var x=[];
             var z="";
                   for(var propt in response){
                 // console.log(propt + ': ' + response[propt]);
                  x[propt]=response[propt];
              }
              x.splice(0,2);
              z= x.join("");              
              if(z=="True")
              {
               // alert("true");
                $.ajax({
                url: delete_url,
                type:"POST", 
                data: {"id":userid}

                }).done(function(){
                e.target.innerText=" Follow";


                });
              console.log(z);  
              }
              else
              {
                //alert("false");
                $.ajax({
                type: 'POST', // Type of response and matches what we said in the route
                url: insert_url, // This is the url we gave in the route
                data: {'id' : userid}}).done(function(){
                e.target.innerText="Unfollow";
                });   
                   console.log(z);
               
                }
      
  //var x=$(this).val();


  });
  return false;

  }











    function fun_checklike(e)
    {
        e.preventDefault();
        var id=e.target.id;
        var postid=e.target.value;
        var Url='http://localhost:/Be_Olympics/check_user_like/';
        var delete_url='http://localhost:/Be_Olympics/delete_like';
        var insert_url='http://localhost:/Be_Olympics/add_like';
        var request = $.get( Url+postid);
        request.done(function(response) {
            // console.log($(".result").html(response));
            var x=[];
            var z="";
            for(var propt in response){
                // console.log(propt + ': ' + response[propt]);
                x[propt]=response[propt];
            }
            x.splice(0,2);
            z= x.join("");
            if(z=="True")
            {
                // alert("true");
                $.ajax({
                    url: delete_url,
                    type:"POST",
                    data: {"id":postid}

                }).done(function(){


                    e.target.innerText=" Like";


                });
                console.log(z);
            }
            else
            {
                //alert("false");
                $.ajax({
                    type: 'POST', // Type of response and matches what we said in the route
                    url: insert_url, // This is the url we gave in the route
                    data: {'id' : postid}}).done(function(){


                    e.target.innerText="Dislike";

                });
                console.log(z);




            }

            //var x=$(this).val();


        });
        return false;

    }


  

