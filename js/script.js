let deleteEntryId;
const ajaxURL = "http://localhost/dylan/crud-app/ajax.php";

//On Page Load

$(window).on("load", function () {
	$(".chat-section").scrollToBottom();
});

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
			window.location.href = "http://localhost/dylan/chat-app/";
			console.log(data);
		},
	});

	return false;
});

// Send Message

$(".chat-send-btn").click(function () {
	$.ajax({
		type: "post",
		dataType: "json",
		data: {
			content: $(".send-message-input").val(),
			recipientId: $(".recipient-id").val(),
			action: "sendMessage",
		},
		url: "http://localhost/dylan/chat-app/ajax.php",
		success: (data) => {
			$(".send-message-input").val("");
			$(".chat-boxes").append(data.html);
			$(".chat-section").scrollToBottom();
			$(".chat-info").text();
		},
	});

	return false;
});

$("body").on("click", ".chat-info", function () {
	const id = $(this).data("id");
	const username = $(this).data("username");
	console.log(id, username);
	$(".main-chat-name").text(username);
	$(".sb-box").show();
	$(".chat-head").show();
	$(".send-section").show();
	window.location.href = "http://localhost/dylan/chat-app/?id=" + id;
});
if ($(".main-chat-name").text() == "") {
	$(".sb-box").hide();
	$(".chat-head").hide();
	$(".send-section").hide();
}

// Scroll To Bottom

$.fn.scrollToBottom = function () {
	this.animate({ scrollTop: this[0].scrollHeight }, 100);
};

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
	if (!el.hasClass("menu-icon") && el.closest(".menu-icon").length == 0) {
		if ($(".menu-icon").hasClass("show")) {
			$(".menu-icon").removeClass("show");
			$(".menu-icon").addClass("hide");
		}
	}
};
