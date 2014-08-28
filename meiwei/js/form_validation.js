/*
 * 	Contact Form Validation v1.0
 *	By Simon Bouchard <www.simonbouchard.com>
 *	You need at least PHP v5.2.x with JSON support for the live validation to work.
 */

function submitContactForm() {  

	jQuery('#contactForm').submit(function() {

		// Disable the submit button
		jQuery('#contactForm input[type=submit]')
			.attr('value', 'Sending message')
			.attr('disabled', 'disabled');

		// AJAX POST request
		jQuery.post(
			jQuery(this).attr('action'),
			{
				name:jQuery('#nameContact').val(),
				email:jQuery('#emailContact').val(),
				message:jQuery('#messageContact').val(),
				sendTo:jQuery('#sendTo').val()
			},
			function(errors) {
				// No errors
				if (errors == null) {
					jQuery('#contactForm').hide().html('<h2>Thank you.</h2><p>Your message has been sent.</p>').show();
					
					jQuery('.alert').removeClass('alert');
				}

				// Errors
				else {
					
					// Re-enable the submit button
					jQuery('#contactForm input[type=submit]')
						.removeAttr('disabled')
						.attr('value', 'Submit');

					// Technical server problem, the email could not be sent
					if (errors.server != null) {
						jQuery('.alert').removeClass('alert');
						alert(errors.server);
						return false;
					}

					// Empty the errorbox and reset the error alerts
					jQuery('.alert').removeClass('alert');

					// Loop over the errors, mark the corresponding input fields,
					// and add the error messages to the errorbox.
					for (field in errors) {
						if (errors[field] != null) {
							jQuery('#' + field + 'Contact').addClass('alert');
						}
					}
				}
			},
			'json'
		);

		// Prevent non-AJAX form submission
		return false;
	});

}