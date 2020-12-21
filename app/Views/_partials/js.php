<!-- jQuery -->
<script src="<?= base_url() ?>/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url() ?>/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?= base_url() ?>/vendors/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="<?= base_url() ?>/vendors/iCheck/icheck.min.js"></script>
<!-- Datatables -->
<script src="<?= base_url() ?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url() ?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url() ?>/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url() ?>/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url() ?>/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= base_url() ?>/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?= base_url() ?>/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?= base_url() ?>/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/vendors/pdfmake/build/vfs_fonts.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?= base_url() ?>/build/js/custom.min.js"></script>
<!-- jquery.inputmask -->
<script src="<?= base_url() ?>/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<script>
	$('.file-upload').file_upload();
</script>
<!-- PNotify -->
<script src="<?= base_url() ?>/vendors/pnotify/dist/pnotify.js"></script>
<script src="<?= base_url() ?>/vendors/pnotify/dist/pnotify.buttons.js"></script>
<script src="<?= base_url() ?>/vendors/pnotify/dist/pnotify.nonblock.js"></script>

<!-- Notification -->
<script>
	$(function() {
		toastr.options.timeOut = "false";
		toastr.options.closeButton = true;
		toastr.options.positionClass = 'toast-bottom-right';
		toastr['info']('Hi there, this is notification demo with HTML support. So, you can add HTML elements like <a href="#">this link</a>');

		$('.btn-toastr').on('click', function() {
			$context = $(this).data('context');
			$message = $(this).data('message');
			$position = $(this).data('position');

			if ($context === '') {
				$context = 'info';
			}

			if ($position === '') {
				$positionClass = 'toast-bottom-right';
			} else {
				$positionClass = 'toast-' + $position;
			}

			toastr.remove();
			toastr[$context]($message, '', {
				positionClass: $positionClass
			});
		});

		$('#toastr-callback1').on('click', function() {
			$message = $(this).data('message');

			toastr.options = {
				"timeOut": "300",
				"onShown": function() {
					alert('onShown callback');
				},
				"onHidden": function() {
					alert('onHidden callback');
				}
			};

			toastr['info']($message);
		});

		$('#toastr-callback2').on('click', function() {
			$message = $(this).data('message');

			toastr.options = {
				"timeOut": "10000",
				"onclick": function() {
					alert('onclick callback');
				},
			};

			toastr['info']($message);

		});

		$('#toastr-callback3').on('click', function() {
			$message = $(this).data('message');

			toastr.options = {
				"timeOut": "10000",
				"closeButton": true,
				"onCloseClick": function() {
					alert('onCloseClick callback');
				}
			};

			toastr['info']($message);
		});
	});
</script>
<script src="<?= base_url() ?>/vendors/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?= base_url() ?>/vendors/sweetalert/myalert.js"></script>
<script src="<?= base_url() ?>/vendors/sweetalert/sweetalert2.all.js"></script>
<script>
	function previewImg() {
		const image = document.querySelector('#image');
		const imageLabel = document.querySelector('.custom-file-label');
		const imgPreview = document.querySelector('.img-preview');

		imageLabel.textContent = image.files[0].name;

		const fileImage = new FileReader();
		fileImage.readAsDataURL(image.files[0]);

		fileImage.onload = function(e) {
			imgPreview.src = e.target.result;
		}
	}
</script>
<!-- bootstrap-daterangepicker -->
<script src="<?= base_url() ?>/vendors/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->
<script src="<?= base_url() ?>/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- jQuery Knob -->
<script src="<?= base_url() ?>/vendors/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- Ion.RangeSlider -->
<script src="<?= base_url() ?>/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
<!-- Initialize datetimepicker -->
<script type="text/javascript">
	$(function() {
		$('#myDatepicker').datetimepicker();
	});

	$('#myDatepicker2').datetimepicker({
		format: 'DD.MM.YYYY'
	});

	$('#myDatepicker3').datetimepicker({
		format: 'hh:mm A',
		ignoreReadonly: true
	});

	$('#myDatepicker4').datetimepicker({
		ignoreReadonly: true,
		allowInputToggle: true
	});

	$('#datetimepicker6').datetimepicker();

	$('#datetimepicker7').datetimepicker({
		useCurrent: false
	});

	$("#datetimepicker6").on("dp.change", function(e) {
		$('#datetimepicker7').data("DateTimePicker").minDate(e.date);
	});

	$("#datetimepicker7").on("dp.change", function(e) {
		$('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
	});
</script>
<script src="<?= base_url() ?>/vendors/validator/multifield.js"></script>
<script src="<?= base_url() ?>/vendors/validator/validator.js"></script>

<!-- Javascript functions	-->
<script>
	function hideshow() {
		var password = document.getElementById("password1");
		var slash = document.getElementById("slash");
		var eye = document.getElementById("eye");

		if (password.type === 'password') {
			password.type = "text";
			slash.style.display = "block";
			eye.style.display = "none";
		} else {
			password.type = "password";
			slash.style.display = "none";
			eye.style.display = "block";
		}

	}
</script>

<script>
	// initialize a validator instance from the "FormValidator" constructor.
	// A "<form>" element is optionally passed as an argument, but is not a must
	var validator = new FormValidator({
		"events": ['blur', 'input', 'change']
	}, document.forms[0]);
	// on form "submit" event
	document.forms[0].onsubmit = function(e) {
		var submit = true,
			validatorResult = validator.checkAll(this);
		console.log(validatorResult);
		return !!validatorResult.valid;
	};
	// on form "reset" event
	document.forms[0].onreset = function(e) {
		validator.reset();
	};
	// stuff related ONLY for this demo page:
	$('.toggleValidationTooltips').change(function() {
		validator.settings.alerts = !this.checked;
		if (this.checked)
			$('form .alert').remove();
	}).prop('checked', false);
</script>
<!-- Select2 -->
<script src="<?= base_url() ?>/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="<?= base_url() ?>/vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- starrr -->
<script src="<?= base_url() ?>/vendors/starrr/dist/starrr.js"></script>
<!-- Switchery -->
<script src="<?= base_url() ?>/vendors/switchery/dist/switchery.min.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="<?= base_url() ?>/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="<?= base_url() ?>/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="<?= base_url() ?>/vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="<?= base_url() ?>/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- jQuery autocomplete -->
<script src="<?= base_url() ?>/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- FullCalendar -->
<script src="<?= base_url() ?>/vendors/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>/vendors/fullcalendar-new/lib/main.js"></script>
<script src="<?= base_url() ?>/vendors/fullcalendar-new/calendarScript.js"></script>