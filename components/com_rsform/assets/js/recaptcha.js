function ajaxValidationRecaptcha(task, formId, data, componentId) {	switch (task) {		case 'beforeSend':			/* seems to be working just fine without			var form = rsfp_getForm(formId);			var container = document.getElementById('recaptchaContainer' + componentId);						if (container.getElementById) {				var response  = container.getElementById('recaptcha_response_field').value;				var challenge = container.getElementById('recaptcha_challenge_field').value;			} else if (container.getElementsByTagName) {				var response  = container.getElementsByTagName('input')[1].value;				var challenge = container.getElementsByTagName('input')[0].value;			} else {				var response  = document.getElementById('recaptcha_response_field').value;				var challenge = document.getElementById('recaptcha_challenge_field').value;			}						data.params.push('recaptcha_response_field=' + encodeURIComponent(response));			data.params.push('recaptcha_challenge_field=' + encodeURIComponent(challenge));			*/		break;				case 'afterSend':			if (data.response[1] && data.response[1].indexOf(componentId) > -1) {				Recaptcha.reload();			}		break;	}}