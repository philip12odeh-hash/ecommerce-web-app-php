
// function in the html to check screen size.
let srcnNotify = ()=>{
	let srnsz = window.innerWidth;
	if(srnsz < 600){
		alert("screen size now less than 600 :"+ srnsz );
	}
	else{
		alert("screen size more than 600 the size is now :" + srnsz);
	}
}
// event listener to check for screen resize and run function to that will display more button
window.addEventListener('resize',()=>{
	let srnsz = window.innerWidth;
	if(srnsz <= 1247){
		let moreButton = document.getElementById("More");
		moreButton.style.display = "inline";
	}
	else if(srnsz > 1247){
		moreButton = document.getElementById("More").style.display = "none";
	}
	
});

// show more button when the page load with view port lower than the level to show perfune button

window.onload = function (){
	let srnsz = window.innerWidth;
	if(srnsz <= 1247){
		let moreButton = document.getElementById("More");
		moreButton.style.display = "inline";
	}
	else if(srnsz > 1247){
		moreButton = document.getElementById("More").style.display = "none";
	}
}

// function to control how clicking the more button displays the drop button and populate it with only removed items

let drop = document.getElementById("more_Container");
	drop.style.display = "none";
	
function more(){
	dropico1 = document.getElementById("dropimg1").style.display;

	dropico2 = document.getElementById("dropimg2").style.display;
	console.log(dropico1);
	
	if(document.getElementById("dropimg1").style.display == "inline"){document.getElementById("dropimg1").style.display = "none";
	document.getElementById("dropimg2").style.display = "inline"}else if(document.getElementById("dropimg1").style.display == "none"){document.getElementById("dropimg1").style.display = "inline";
	document.getElementById("dropimg2").style.display = "none"};
	
	let srnsz = window.innerWidth;
	if(drop.style.display == "none"){
		drop.style.display = "block";
	}else{drop.style.display = "none"}
	if(srnsz <= 1247){
		dropItems = document.getElementsByClassName("items");
		for(i=0; i < dropItems.length; i++){
			dropItems[i].style.display = "none";
		}
			dropItems[0].style.display = "block";
		}
	if(srnsz <= 1115){
		dropItems = document.getElementsByClassName("items");
		for(i=0; i < dropItems.length; i++){
			dropItems[i].style.display = "none";
		}
			dropItems[0].style.display = "block";
			dropItems[1].style.display = "block";
			
		}
	if(srnsz <= 979){
		dropItems = document.getElementsByClassName("items");
		for(i=0; i < dropItems.length; i++){
			dropItems[i].style.display = "none";
		}
			dropItems[0].style.display = "block";
			dropItems[1].style.display = "block";
			dropItems[2].style.display = "block";
			
		}
	if(srnsz <= 868){
		dropItems = document.getElementsByClassName("items");
		for(i=0; i < dropItems.length; i++){
			dropItems[i].style.display = "none";
		}
			dropItems[0].style.display = "block";
			dropItems[1].style.display = "block";
			dropItems[2].style.display = "block";
			dropItems[3].style.display = "block";
			
			
		}
	if(srnsz <= 807){
		dropItems = document.getElementsByClassName("items");
		for(i=0; i < dropItems.length; i++){
			dropItems[i].style.display = "none";
		}
			dropItems[0].style.display = "block";
			dropItems[1].style.display = "block";
			dropItems[2].style.display = "block";
			dropItems[3].style.display = "block";
			dropItems[4].style.display = "block";
			dropItems[5].style.display = "block";
			dropItems[6].style.display = "block";
			
			
			
		}
		
		
		
}

