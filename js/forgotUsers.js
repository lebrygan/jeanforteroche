var forgotButton = document.getElementById("forgotPwd");

forgotButton.addEventListener("click", (e)=>{

	var formData = new FormData();
	formData.append("email", document.getElementById("email").value);

	ajaxPost("http://cosmopoly.fr/controller/ajaxController/forgotPwd.php",formData,
		(response)=>{
			e.target.parentNode.insertAdjacentHTML('afterend',
				'<p class="alert alert-warning">Un nouveau mot de passe a été envoyé à l\'adresse spécifiée.</p>');
		});
});