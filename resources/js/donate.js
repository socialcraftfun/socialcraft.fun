addEventListener("submit", (event) => {
    event.preventDefault();


    let form = document.forms.payment;
    let username = form.username.value;
    let email = form.email.value;
    let amount = form.amount.value;

    processDonate(username, amount, email);
});
