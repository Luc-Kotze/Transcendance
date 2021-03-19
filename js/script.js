let deleteEntryId;
const ajaxURL = "http://localhost/dylan/crud-app/ajax.php";

// Letter Jumps

const labels = document.querySelectorAll("label");

labels.forEach(
	(label) =>
		(label.innerHTML = label.innerText
			.split("")
			.map(
				(letter, idx) =>
					`<span style="transition-delay:${idx * 50}ms">${letter}</span>`
			)
			.join(""))
);

// Sign Up Ajax Request

$("#signup-form").submit(function () {
	$.ajax({
		type: "post",
		dataType: "json",
		data: {
			name: $("#username-signup").val(),
			email: $("#email-signup").val(),
			password: $("#password-signup").val(),
			action: "signup",
		},
		url: "http://localhost/dylan/chat-app/ajax.php",
		success: (data) => {
			window.location.href = "http://localhost/dylan/chat-app/";
		},
	});

	return false;
});

$("#login-form").submit(function () {
	$.ajax({
		type: "post",
		dataType: "json",
		data: {
			name: $("#username-login").val(),
			password: $("#password-login").val(),
			action: "signin",
		},
		url: "http://localhost/dylan/chat-app/ajax.php",
		success: (data) => {
			// window.location.href = "http://localhost/dylan/chat-app/";
			console.log(data);
		},
	});

	return false;
});

// Form Animations

$(".sign-up-btn").on("click", function () {
	$(".sign-in-form").addClass("form-up");
	$(".sign-up-form").addClass("form-left");
});

$(".sign-in-btn").on("click", function () {
	$(".sign-in-form").removeClass("form-up");
	$(".sign-up-form").removeClass("form-left");
});

// Dropdown Menu

$(".menu-icon").click(function () {
	console.log("drol");
	$("#myDropdown").toggleClass("show popin-anim");
});

window.onclick = function (event) {
	if (!event.target.matches(".fa-ellipsis-v")) {
		var dropdowns = document.getElementsByClassName("dropdown-content");
		var i;
		for (i = 0; i < dropdowns.length; i++) {
			var openDropdown = dropdowns[i];
			function wait(ms) {
				var start = new Date().getTime();
				var end = start;
				while (end < start + ms) {
					end = new Date().getTime();
				}
			}
			if (openDropdown.classList.contains("show")) {
				wait(0);
				openDropdown.classList.add("popout-anim");

				openDropdown.classList.remove("popin-anim");
			}
		}
	}
};
