//Button to change or add a new user
var addChangeUserButton = document.getElementById("addChangeUser");

addChangeUserButton.addEventListener("click", (e)=>{

	var formData = new FormData();
	$email = document.getElementById("email").value;
	$password = document.getElementById("password").value;
	var mailRegex = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/i;
	if($password.length < 2){
		document.getElementById("respondUser").innerHTML = '<p class="alert alert-danger">Veuillez mettre un mot de passe</p>';
	}else if(!mailRegex.test($email)){
		document.getElementById("respondUser").innerHTML = '<p class="alert alert-danger">Veuillez mettre une adresse mail valide</p>';
	}else{
		formData.append("email", $email);
		formData.append("pwd", $password);

		ajaxPost("http://cosmopoly.fr/controller/ajaxController/addChangeUsers.php",formData,
			(response)=>{
				document.getElementById("respondUser").innerHTML = '<p class="alert alert-success">L\'utilisateur a été modifié</p>';
			});
	}
});


//Button to delete existing user
var deleteUserButton = document.getElementById("deleteUser");

deleteUserButton.addEventListener("click", (e)=>{

	var formData = new FormData();
	formData.append("email", document.getElementById("email").value);


	ajaxPost("http://cosmopoly.fr/controller/ajaxController/deleteUsers.php",formData,
		(response)=>{
			document.getElementById("respondUser").innerHTML = '<p class="alert alert-success">L\'utilisateur a été supprimé</p>';
		});
});