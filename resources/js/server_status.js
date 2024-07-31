function updateOnline() {
    $.ajax({
        method: 'GET',
        url: '/api/online',
        success: function(response) {
            let online = response.data['online'];
            $('.number').text(online);

        }
    });
}

updateOnline();
setInterval(updateOnline, 30000);



