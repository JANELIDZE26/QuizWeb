const generate = document.getElementById("generatorButton");
const codePlacement = document.getElementById("codePlacement");
const copy = document.getElementById("copy");
const form = document.getElementById("form");

generate.addEventListener("click", () => {
	
	var result           = '';
	var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	var charactersLength = characters.length;
	for ( var i = 0; i < 8; i++ ) {
		result += characters.charAt(Math.floor(Math.random() * charactersLength));
	}
	codePlacement.value = result;  
	
	codePlacement.select();
	codePlacement.setSelectionRange(0, 99999)
	document.execCommand("copy");



})

form.addEventListener("submit", (event) => {
	
	if(codePlacement.value.length < 7){
		event.preventDefault();
	}
})

