//Get all button
// Tous les éléments ayant la classe "merveilles"
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