class ShowHideButton{
	constructor(button,comments){
		this.button = button;
		this.comments = comments;
		this.hide = false;

		this.button.addEventListener("click",this.switch.bind(this));
		this.hideComments();
		if(this.comments.length > 3){
			this.button.style.display = "block";
		}
	}

	switch(){
		if(this.hide)
			this.showComments();
		else
			this.hideComments();
	}

	hideComments(){
		if(this.comments.length > 3){
			for (var j = this.comments.length-2; j >= 3; j--) {
				this.comments[j].style.display = "none";
			}
			this.button.innerHTML = "Afficher tout les commentaires";
			this.hide = true;
		}
	}

	showComments(){
		for (var j = this.comments.length-2; j >= 3; j--) {
			this.comments[j].style.display = "";
		}
		this.button.innerHTML = "Cacher les commentaires";
		this.hide=false;
	}
}