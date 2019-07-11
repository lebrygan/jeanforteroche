//Buttons for the visitor view
var signalButtons = document.getElementsByClassName("signal");

for (var i = signalButtons.length - 1; i >= 0; i--) {
	signalButtons[i].addEventListener("click", (e)=>{

			var signaled = new FormData();
			signaled.append("comment", e.target.name);

			ajaxPost("http://localhost/projet4/controller/ajaxController/signalComment.php",signaled,
				(response)=>{
					e.target.parentNode.parentNode.children[1].innerHTML = '<p class="alert alert-danger">Ce commentaire a été signalé</p>';
				});
		});
}

//Buttons for the autor view
var deleteButtons = document.getElementsByClassName("deleteComment");

for (var i = deleteButtons.length - 1; i >= 0; i--) {
	deleteButtons[i].addEventListener("click", (e)=>{

			var comment = new FormData();
			comment.append("comment", e.target.name);

			ajaxPost("http://localhost/projet4/controller/ajaxController/deleteComment.php",comment,
				(response)=>{
					e.target.parentNode.innerHTML = '<p class="alert alert-danger">Le commentaire a été supprimé</p>';
				});
		});
}

var unSignalButtons = document.getElementsByClassName("unSignal");

for (var i = unSignalButtons.length - 1; i >= 0; i--) {
	unSignalButtons[i].addEventListener("click", (e)=>{

			var comment = new FormData();
			comment.append("comment", e.target.name);

			ajaxPost("http://localhost/projet4/controller/ajaxController/unSignalComment.php",comment,
				(response)=>{
					e.target.parentNode.innerHTML = '<p class="alert alert-success">Le commentaire a été rétabli</p>';
				});
		});
}


// Show/hide buttons
var comments = document.getElementsByClassName("comments");
var hideButtons = document.getElementsByClassName("hideComments");
var showHideButtons = [];

for (var i = 0 ; i <= comments.length - 1; i++) {
	showHideButtons[i] = new ShowHideButton(hideButtons[i],comments[i].children);
}

