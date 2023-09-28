const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item => {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i => {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if (window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if (searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if (window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if (window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if (this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if (this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})

const profile = document.querySelector('nav .profile');
const imgProfile = profile.querySelector('img');
const dropdownProfile = profile.querySelector('.profile-link');

imgProfile.addEventListener('click', function () {
	dropdownProfile.classList.toggle('show');
})

window.addEventListener('click', function (e) {
	if (e.target !== imgProfile) {
		if (e.target !== dropdownProfile) {
			if (dropdownProfile.classList.contains('show')) {
				dropdownProfile.classList.remove('show');
			}
		}
	}

	// allMenu.forEach(item=> {
	// 	const icon = item.querySelector('.icon');
	// 	const menuLink = item.querySelector('.menu-link');

	// 	if(e.target !== icon) {
	// 		if(e.target !== menuLink) {
	// 			if (menuLink.classList.contains('show')) {
	// 				menuLink.classList.remove('show')
	// 			}
	// 		}
	// 	}
	// })
})

function validateCheckbox() {
	var checkbox = document.getElementById("gridCheck");
	var warningMsg = document.getElementById("warningMsg");

	if (!checkbox.checked) {
		warningMsg.style.display = "block";
	} else {
		warningMsg.style.display = "none";
		// Add your logic for when the checkbox is checked here
	}
}
const inputBox = document.getElementById('inputBox');
const listContainer = document.getElementById('list-container');
function addTask(){
	if (inputBox.value === '') {
        let errorText = document.querySelector('.error-text');
        errorText.innerHTML = 'Bạn cần điền ghi chú trước';
    } else {
        let li = document.createElement('li');
        li.innerHTML = inputBox.value;
        listContainer.appendChild(li);
        let span = document.createElement('span');
        span.innerHTML = "\u00d7";
        li.appendChild(span);
        inputBox.value = '';
        let errorText = document.querySelector('.error-text');
        errorText.innerHTML = ''; // Xóa nội dung trong errorText
        saveTask();
    }
	

}

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

