$(function () {
	// Show Modal of Create Form
	isCreateForm();

	// Show Modal of Edit Form
	isEditForm();

	//Handle Submit form OR Handle Update Form
	isFormSubmit();

	// DELETE ROW
	DeleteRow();
});

function isCreateForm() {
	$('#btnCreateForm').on('click', function () {
		$('#formModal input, #formModal select, #formModal textarea').val('');
		$('.is-invalid').removeClass('is-invalid');
		$('#formModalLabel').text('Create Form');
		$('#btnSubmit').text('Submit');
		$('#formModal').modal('show');
	});
}

function isEditForm() {
	$(document).on('click', '.btnEditForm', function () {
		const data = $(this).data('data');
		for (let key in data) {
			if (data.hasOwnProperty(key)) {
				$('#' + key).val(data[key]);
			}
		}
		$('.is-invalid').removeClass('is-invalid');
		$('#formModalLabel').text('Edit Form');
		$('#btnSubmit').text('Save Changes');
		$('#formModal').modal('show');
	});
}

function isFormSubmit() {
	// ON SUBMIT
	var url = $('#url').val();
	$('#btnSubmit').on('click', function (event) {
		var btn = $(this);
		btn.prop('disabled', true); // Disable the button
		btn.html(
			'<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...'
		); // Change the text to indicate loading

		event.preventDefault(); // Prevent the form from submitting
		const formDataObject = $('#form-modal').serializeArray();
		const id = $('#id').val();
		const modalLabel = $('#formModalLabel').text();
		if (modalLabel === 'Edit Form') {
			const requestData = {
				formData: {}
			};
			formDataObject.forEach(item => {
				requestData.formData[item.name] = item.value;
			});

			update(url, id, requestData, btn);
		} else {
			const requestData = {
				formData: {}
			};
			formDataObject.forEach(item => {
				requestData.formData[item.name] = item.value;
			});
			create(url, requestData, btn);
		}
	});
}

function DeleteRow() {
	var url = $('#url').val();
	$(document).on('click', '.btnDeleteRow', function () {
		const id = $(this).data('id');
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then(result => {
			if (result.isConfirmed) {
				destroy(url, id);
			}
		});
	});
}

//CREATE API
function create(url, requestData, btn) {
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: `/${url}`,
		method: 'POST',
		data: requestData.formData,
		success: function (data) {
			// Create FORM SUBMIT
			Swal.fire({
				title: 'Created!',
				text: 'Your file has been Created.',
				icon: 'success'
			});
			btn.prop('disabled', false);
			btn.html('Submit');
			$('#table-content').html('');
			$('#table-content').html(data['table_data']);
			$('#formModal').modal('hide');
		},
		error: function (err) {
			$('.is-invalid').removeClass('is-invalid');
			const errorValidations = err.responseJSON.errors;
			btn.prop('disabled', false);
			btn.html('Submit');
			if (errorValidations) {
				$.each(errorValidations, function (key, value) {
					console.log(key + ': ' + value);
					$('#' + key).addClass('is-invalid');
					$('#validation-' + key).text(value);
				});
			}
		}
	});
}

//UPDATE API
function update(url, id, requestData, btn) {
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: `/${url}/${id}`,
		method: 'PUT',
		data: requestData.formData,
		success: function (data) {
			// Create FORM SUBMIT
			Swal.fire({
				title: 'Updated!',
				text: 'Your file has been Updated.',
				icon: 'success'
			});
			btn.prop('disabled', false);
			btn.html('Submit');
			$('#formModal').modal('hide');
			$('#table-content').html('');
			$('#table-content').html(data['table_data']);
			$('#formModal').modal('hide');
		},
		error: function (err) {
			$('.is-invalid').removeClass('is-invalid');
			const errorValidations = err.responseJSON.errors;
			btn.prop('disabled', false);
			btn.html('Submit');
			if (errorValidations) {
				$.each(errorValidations, function (key, value) {
					console.log(key + ': ' + value);
					$('#' + key).addClass('is-invalid');
					$('#validation-' + key).text(value);
				});
			}
		}
	});
}

//DELETE API
function destroy(url, id) {
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		url: `/${url}/${id}`,
		method: 'DELETE',
		success: function (data) {
			// Create FORM SUBMIT
		o

			$('#table-content').html('');
			$('#table-content').html(data['table_data']);
			$('#formModal').modal('hide');
		},
		error: function (err) {
			console.log(err);
		}
	});
}
