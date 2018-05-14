function addNewComment(name,email,text, date){
  var newComment = $("#comments div:eq(0)").clone();
  newComment.find(".comment-title").text(name);
  newComment.find(".comment-email").text(email);
  newComment.find(".comment-text").text(text);
  newComment.find(".comment-date").text(date);

  return newComment;
}

function loadAllComments(){
  $.get('api.php?action=getNew', function(result){
    // console.log("New comments" + result);
    var resultComments = JSON.parse(result);
    // console.log(resultComments[1].email);
    var comments = [];
    for (var i = 0; i < resultComments.length; i++) {
      var newComment = addNewComment(resultComments[i].name,resultComments[i].email,resultComments[i].text,resultComments[i].date);
      comments.push(newComment);
    }
    // console.log("comments");
    // console.log(comments);
    $('#comments').children().remove();
    $('#comments').append(comments);
  })
}
loadAllComments();

setInterval(loadAllComments, 3000);




