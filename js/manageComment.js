//Buttons for the visitor view
var signalButtons = document.getElementsByClassName("signaled");

for (var i = signalButtons.length - 1; i >= 0; i--) {
	signalButtons[i].addEventListener("click", (e)=>{

			var signaled = new FormData();
			signaled.append("comment", e.target.name);

			ajaxPost("http://localhost/projet4/controller/signaled.php",signaled,
				(response)=>{
					e.target.parentNode.firstChild.style.border = '1px solid red';
					e.target.parentNode.firstChild.insertAdjacentHTML("beforeEnd",'<p class="signalText">Ce commentaire a été signalé</p>');;
				});
		});
}

//Buttons for the autor view
var deleteButtons = document.getElementsByClassName("delete");

for (var i = signalButtons.length - 1; i >= 0; i--) {
	signalButtons[i].addEventListener("click", (e)=>{

			var comment = new FormData();
			comment.append("comment", e.target.name);

			ajaxPost("http://localhost/projet4/controller/deleteComment.php",comment,
				(response)=>{
					e.target.parentNode.innerHTML = '<p>Le commentaire a été supprimé</p>';
				});
		});
}