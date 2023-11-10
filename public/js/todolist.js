listContainer.addEventListener("click",function(e){
	if(e.target.tagName === "LI"){
		e.target.classList.toggle("checked");
		saveTask();
	}else if(e.target.tagName === "SPAN"){
		e.target.parentElement.remove();
		saveTask();
	}
}, false)
function delAllTask() {
    listContainer.innerHTML = "";
	let errorText = document.querySelector('.error-text');
	errorText.innerHTML = ''; // Xóa nội dung trong errorText
    localStorage.clear();
}

function saveTask(){
	localStorage.setItem("data", listContainer.innerHTML);
}

function showTask(){
	listContainer.innerHTML = localStorage.getItem("data");
}
showTask();