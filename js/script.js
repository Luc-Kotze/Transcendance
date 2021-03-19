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
	$(".menu-icon").toggleClass("show");

	if (!$(".menu-icon").hasClass("show")) {
		$(".menu-icon").addClass("hide");
	}
});

window.onclick = function (event) {
	const el = $(event.target);
	console.log($(".menu-icon").hasClass("show"));
	if (!el.hasClass("menu-icon") && el.closest(".menu-icon").length == 0) {
		if ($(".menu-icon").hasClass("show")) {
			$(".menu-icon").removeClass("show");
			$(".menu-icon").addClass("hide");
		}
	}
};
