const signUpButton = document.getElementById("signUp");
const signInButton = document.getElementById("signIn");
const container = document.getElementById("container");

signUpButton.addEventListener("click", () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener("click", () => {
	container.classList.remove("right-panel-active");
});


let email =document.forms['form']['email'];
// console.log(email)
let pass =document.forms['form']['password'];


let email_error =document.querySelector(".emailError")
let pass_error =document.querySelector(".passError")

email.addEventListener('textInput',email_verify());

function validated(){

	if(email.value.length <9){
      email_error.style.display="block";

	}
	 if(pass.value.length < 6 ){		
      pass_error.style.display="block";
		return false;

	}

}

function email_verify() {
	if(email.value.length >= 8){
		email_error.style.display="none";
	}
	if(pass.value.length < 6 ){		
		pass_error.style.display="none";
		  return true;
	}
  
}



