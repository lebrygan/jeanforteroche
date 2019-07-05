//Buttons to delete billet
var deleteBillet = document.getElementsByClassName("deleteBillet");

for (var i = deleteBillet.length - 1; i >= 0; i--) {
	deleteBillet[i].addEventListener("click", (e)=>{
		e.preventDefault();
			if(confirm('Êtes-vous sûrde vouloir supprimer ce billet ?')){

				var billet = new FormData();
				billet.append("billet", e.target.name);


				ajaxPost("http://localhost/projet4/controller/ajaxController/deleteBillet.php",billet,
					(response)=>{
						e.target.parentNode.parentNode.innerHTML = '<p>Le billet a été supprimé</p>';
					});
				return false;
			}else{
				return false;
			}
		});
}