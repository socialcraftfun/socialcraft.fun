addEventListener("submit", (event) => {
    event.preventDefault();


    let form = document.forms.payment;
    let username = form.username.value;
    let email = form.email.value;
    let amount = form.amount.value;

    processDonate(username, amount, email);
});


Array.prototype.random = function () {
    return this[Math.floor((Math.random()*this.length))];
}

let buttons = [
    'Внести свой вклад', 'Поддержать SocialCraft!'
]

$('#donate').text(buttons.random());
$("input.required, select.required, textarea.required").parent().find("label").append("<span class='text-danger'> *</span>")

$("input.optional, select.optional, textarea.optional").parent().find("label").append("<small class='text-muted'> (optional)</small>")

