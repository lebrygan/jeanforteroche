class ShowHideButton{
	constructor(button,comments){
		this.button = button;
		this.comments = comments;
		this.hide = false;

		this.button.addEventListener("click",this.switch.bind(this));
		this.hideComments();
		if(this.comments.length > 3){
			this.button.className = "hideComments btn btn-primary mx-auto mb-5";
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
				this.comments[j].className = "comment d-none";
			}
			this.button.innerHTML = "Afficher tout les commentaires";
			this.hide = true;
		}
	}

	showComments(){
		for (var j = this.comments.length-2; j >= 3; j--) {
			this.comments[j].className = "comment d-flex justify-content-center align-items-center flex-wrap row col-md-10 col-sm-12 offset-md-1";
		}
		this.button.innerHTML = "Cacher les commentaires";
		this.hide=false;
	}
}