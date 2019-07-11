var addChangeUserButton = document.getElementById("addChangeUser");

addChangeUserButton.addEventListener("click", (e)=>{

	var formData = new FormData();
	formData.append("email", document.getElementById("email").value);
	formData.append("pwd", document.getElementById("password").value);

	ajaxPost("http://cosmopoly.fr/controller/ajaxController/addChangeUsers.php",formData,
		(response)=>{
			document.getElementById("respondUser").innerHTML = '<p class="alert alert-danger">L\'utilisateur a été modifié</p>';
		});
});

var deleteUserButton = document.getElementById("deleteUser");


deleteUserButton.addEventListener("click", (e)=>{

	var formData = new FormData();
	formData.append("email", document.getElementById("email").value);


	ajaxPost("http://cosmopoly.fr/controller/ajaxController/deleteUsers.php",formData,
		(response)=>{
			document.getElementById("respondUser").innerHTML = '<p class="alert alert-danger">L\'utilisateur a été supprimé</p>';
		});
});