import './bootstrap';
import 'bootstrap';
import './donate';

/**
 * Process a donation and send a POST request to the server.
 *
 * @param {string} username - The username of the donor.
 * @param {number} amount - The donation amount.
 * @param {string} [email] - The optional email of the donor.
 */
window.processDonate = function (username, amount, email = "") {
    let data = {
        username: username,
        amount: amount,
        email : email
    };

    $.ajax({
        url: '/api/payment/purchase',
        method: 'POST',
        data: JSON.stringify(data),
        dataType: 'json',
        headers: {
            'Content-Type': 'application/json;charset=utf-8',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error: function (xhr, status, error) {
            console.log("Server error thrown: " + error);
        },
        success: function(xhr) {
            if (xhr.response.method === 'url') {
                window.location.href = xhr.response.data;
            }
        }
    });
}

Array.prototype.random = function () {
    return this[Math.floor((Math.random()*this.length))];
}

let buttons = [
    'Внести свой вклад', 'Поддержать SocialCraft!'
]

$('#donate').text(buttons.random());
$("input.required, select.required, textarea.required").parent().find("label").append("<span class='text-danger'> *</span>")

$("input.optional, select.optional, textarea.optional").parent().find("label").append("<small class='text-muted'> (optional)</small>")
