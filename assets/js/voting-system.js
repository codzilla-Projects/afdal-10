jQuery(document).ready(function ($) {

    $(window).on('load', function () {

        var list_id = $('body').attr("data-post-id");

        let voteKey = 'list_'+list_id;

        var userListVotes = JSON.parse(localStorage.getItem("userListVotes") || "[]");
        var listInVotes = userListVotes.filter(obj => obj.key == voteKey);

        if(listInVotes.length > 0){
            $(".user_vote").off('click');

            $(".user_vote").addClass("disable-click");

            var post_id = listInVotes[0].value;
            $(`#posts-list .post_btn_list span a[data-post_id = '${post_id}'] i`).css({color:" var(--primaryColor)",backgroundColor: "#fff"});



        }


    });


    $(document).on('click','.user_vote',function(e){

        $('#postsLoader').fadeIn(200);
        $(".user_vote").off('click');
        $(".user_vote").addClass("disable-click");

        e.preventDefault();
        var post_id = $(this).attr("data-post_id");
        var list_id = $('#list_id').attr("data-id");
        var parentDiv = $(this).parents('.post');
        let voteKey = 'list_'+list_id;

        var userListVotes = JSON.parse(localStorage.getItem("userListVotes") || "[]");
        let result = userListVotes.flatMap(Object.keys);
        const isInArray = result.includes(voteKey);
        console.log(isInArray);

    $.ajax({
        type: "post",
        dataType: "json",
        url: ajax_url,
        data: { action: "add_user_vote", post_id: post_id, list_id: list_id, nonce: nonce },
        success: function (response) {
            window.ajaxProcessing = false;

            if (response.type == "success") {
//                console.log(response);

                $(`a[data-post_id = '${post_id}'] .vote_counter`).html(response.vote_count);
                $('#posts-list').html(response.data);
                $(`#postsLoader`).html('<div class="p-3"><p  style="margin:auto;font-size: 25px;padding-top:10%;">تم التصويت بنجاح</p></div>').fadeIn(200);
//                $('#postsLoader').html("<p>تم التصويت بنجاح</p>");
                setTimeout(function(){
//                $('#postsLoader').fadeOut(1000);
                    $(`#postsLoader`).fadeOut(500);
                    $(`#posts-list .post_btn_list span a[data-post_id = '${post_id}'] i`).css({color:" var(--primaryColor)",backgroundColor: "#fff"});


                }, 1000);
                let voteKey = 'list_'+list_id;

                let newVote = {key:voteKey, value: post_id};
                userListVotes.push(newVote);
                localStorage.setItem('userListVotes',JSON.stringify(userListVotes));
                localStorage.setItem('list_'+list_id ,JSON.stringify(post_id))




            } else {

                 $(`#postsLoader`).html('<div class="p-3"><p  style="margin:auto;font-size: 25px;padding-top:10%;">لقد تم التصويت لهذه القائمة من قبل </p></div>').fadeOut(1000);
//                $(`a[data-post_id = '${post_id}'] .vote_number`).html(response.msg).fadeOut(3000);
                }
        },
         error : function(jqXHR, textStatus, errorThrown) {
            $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }
    });
    });
});

jQuery('document').ready(function($){
    var commentform=$('#commentform'); // find the comment form
    commentform.prepend('<div id="comment-status" ></div>'); // add info panel before the form to provide feedback or errors
    var statusdiv=$('#comment-status'); // define the infopanel

    commentform.submit(function(){
        //serialize and store form data in a variable
        var formdata=commentform.serialize();
        //Add a status message
        statusdiv.html('<p>يعالج...</p>');
        //Extract action URL from commentform
        var formurl=commentform.attr('action');
        //Post Form with data
        $.ajax({
            type: 'post',
            url: formurl,
            data: formdata,
            error: function(XMLHttpRequest, textStatus, errorThrown){
                statusdiv.html('<p class="ajax-error" >ربما تكون قد تركت أحد الحقول فارغًا ، أو أنك تقوم بالنشر بسرعة كبيرة</p>');
                                },
            success: function(data, textStatus){
                if(data=="success")
                    statusdiv.html('<p class="ajax-success" >شكرا على تعليقك. نحن نقدر ردك.</p>');
                else
                    statusdiv.html('<p class="ajax-error" >يرجى الانتظار بعض الوقت قبل نشر تعليقك القادم</p>');
                    commentform.find('textarea[name=comment]').val('');
                                }
                });
                return false;
        });
});


$(document).on('click','.comment_post_quick_view',function(e){

    e.preventDefault();
    var post_id      = $(this).attr("data-id");
    var comments_num = $(this).attr("data-comments");
    if(comments_num == '0') return false;
    var post_data = {action: "last_post_comment", post_id : post_id , nonce: nonce };
    $.ajax({
        type : "post",
        dataType : "json",
        url : ajax_url,
        data : post_data,
        success: function(response) {
          if(response.type === "success") {
              $('.modal-title').html(response.title);
              $('.modal-body').html(response.data);
              $("#postcomments").modal('show');
          }
        }
    });
});


function getAllPosts(){
    var post_id      = $(this).attr("data-id");
    $.ajax({
        url: ajax_url,
        data : {action: "ten_posts",post_id : post_id , nonce: nonce },
        dataType : "json",
        success: function(response) {
          if(response.type == "success") {
              $('#wrapper').html(response.output);
          }
            else{
            }
        },

        complete: function() {
       // Schedule the next request when the current one's complete
       setInterval(getAllPosts, 5000); // The interval set to 60 seconds
     }

    });

  };
