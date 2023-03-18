$(function () {
	// file label
	bsCustomFileInput.init();
	//---------------------------------------

	// lightbox
	if ($('[data-toggle="lightbox"]').length > 0) {
		$(document).on("click", '[data-toggle="lightbox"]', function (event) {
			event.preventDefault();
			$(this).ekkoLightbox({
				alwaysShowClose: true,
			});
		});
		$(".filter-container").filterizr({ gutterPixels: 3 });
		$(".btn[data-filter]").on("click", function () {
			$(".btn[data-filter]").removeClass("active");
			$(this).addClass("active");
		});
	}
	//---------------------------------------
});

// load datatable
(function loadDatatable() {
	$("table[data-role='datatable']").each(function () {
		let _this = this;
		// console.log(_this);
		let url = $(_this).attr("data-url");
		// console.log(url);
		$(_this).DataTable({
			// Processing indicator
			processing: true,
			// DataTables server-side processing mode
			serverSide: true,
			// Initial no order.
			order: [],
			// disable ordering
			ordering: false,
			// search
			search: {
				return: true,
			},
			// Load data from an Ajax source
			ajax: {
				url: url,
				type: "POST",
			},
			//Set column definition initialisation properties
			columnDefs: [
				{
					targets: [4],
					orderable: false,
				},
			],
		});
	});
})();

(function editor() {
	$("textarea[data-role='editor']").each(function () {
		let _this = this;
		$(_this).summernote();
	});
})();

(function advancedSelect() {
	$("select[data-role='select']").each(function () {
		let _this = this;
		$(_this).select2();
	});
})();

//form image placeholder
(function formImgPlaceholder() {
	let imageInput = $("input[name='image']");
	if (imageInput.length > 0) {
		$(imageInput).change(function () {
			if ($(this).prop("files") && $(this).prop("files")[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					let imagePreview = $("img#logo-placeholder");
					if (imagePreview.length > 0) {
						$(imagePreview).attr("src", e.target.result);
						$(imagePreview).before(
							"<p style='margin: 10px 0px;'>Hình ảnh đã chọn: </p>"
						);
					}
				};
				reader.readAsDataURL($(this).prop("files")[0]);
			}
		});
	}
})();

(function dropzone() {
	// DropzoneJS Demo Code Start
	Dropzone.autoDiscover = false;

	let dropzone = $(document).find("#dropzone");
	if ($(dropzone).length > 0) {
		// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
		let previewNode = document.querySelector("#template");
		previewNode.id = "";
		let previewTemplate = previewNode.parentNode.innerHTML;
		previewNode.parentNode.removeChild(previewNode);
		let url = $(dropzone).attr("data-url");
		var myDropzone = new Dropzone(document.getElementById("dropzone"), {
			// Make the whole body a dropzone
			url: url, // Set the url
			thumbnailWidth: 80,
			thumbnailHeight: 80,
			parallelUploads: 20,
			previewTemplate: previewTemplate,
			autoQueue: false, // Make sure the files aren't queued until manually added
			previewsContainer: "#previews", // Define the container to display the previews
			clickable: ".fileinput-button", // Define the element that should be used as click trigger to select files.
		});

		myDropzone.on("addedfile", function (file) {
			// Hookup the start button
			file.previewElement.querySelector(".start").onclick = function () {
				myDropzone.enqueueFile(file);
			};
		});

		// Update the total progress bar
		myDropzone.on("totaluploadprogress", function (progress) {
			document.querySelector("#total-progress .progress-bar").style.width =
				progress + "%";
		});

		myDropzone.on("sending", function (file) {
			// Show the total progress bar when upload starts
			document.querySelector("#total-progress").style.opacity = "1";
			// And disable the start button
			file.previewElement
				.querySelector(".start")
				.setAttribute("disabled", "disabled");
		});

		// Hide the total progress bar when nothing's uploading anymore
		myDropzone.on("queuecomplete", function (progress) {
			document.querySelector("#total-progress").style.opacity = "0";
		});

		// Setup the buttons for all transfers
		// The "add files" button doesn't need to be setup because the config
		// `clickable` has already been specified.
		$(dropzone)
			.find("#actions .start")
			.on("click", function () {
				myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
			});
		$(dropzone)
			.find("#actions .cancel")
			.on("click", function () {
				myDropzone.removeAllFiles(true);
			});
		// DropzoneJS Demo Code End
		//---------------------------------------
	}
})();

function show_toast_alert(options = {}) {
	let className = (title = "");
	switch (options.type.toLowerCase()) {
		case "success":
			className = "bg-success";
			title = "Thành công!";
			break;
		case "info":
			className = "bg-info";
			title = "Thông báo!";
			break;
		case "warning":
			className = "bg-warning";
			title = "Cảnh báo!";
			break;
		case "error":
			className = "bg-danger";
			title = "Báo lỗi!";
			break;
		default:
			title = "Thông báo!";
			break;
	}
	$(document).Toasts("create", {
		title: title,
		body: options.message,
		class: className,
		position: "topRight",
		autohide: true,
		delay: 10000,
	});
}
