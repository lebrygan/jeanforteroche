//Class to show or hide comments when there are more than 2
class ShowHideButton{
	constructor(button,comments){
		this.button = button;
		this.comments = comments;
		this.hide = false;

		this.button.addEventListener("click",this.switch.bind(this));
		if(this.comments.length > 4){
			this.hideComments();
			this.button.className = "hideComments btn btn-dark mx-auto mt-2 mb-4";
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
				this.comments[j].className = "d-none";
			}
			this.button.innerHTML = "Afficher tout les commentaires";
			this.hide = true;
		}
	}

	showComments(){
		for (var j = this.comments.length-2; j >= 3; j--) {
			this.comments[j].className = "bg-white d-flex justify-content-center align-items-center flex-wrap row col-sm-12 mx-0 my-1 p-1";
		}
		this.button.innerHTML = "Cacher les commentaires";
		this.hide=false;
	}
}