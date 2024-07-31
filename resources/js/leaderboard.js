function buildTable(players) {
    let list = document.getElementById('players');
    list.innerHTML = '';
    for (let i = 0; i < players.length; i++) {
        let player = players[i];
        const item = document.createElement('tr');

        item.innerHTML =
            `
                <td>${i+1}</td>
                <td>${player.username}</td>
                <td>${(player.played_minutes/60).toFixed(2)} ч.</td>
            `;

        list.appendChild(item);
    }
}

function searchTable(data, value) {
    let filteredData = [];
    value = value.toLowerCase();

    for (let i = 0; i < data.length; i++) {
        let name = data[i].username.toLowerCase();

        if (name.includes(value)) {
            filteredData.push(data[i]);
        }
    }

    return filteredData;
}

let players = [];


$.ajax({
    method: 'GET',
    url: '/api/players',
    success: function(response) {
        players = response.data;

        buildTable(players);
    }
});

$('#search-input').on('keyup', function () {
    let value = $(this).val();
    let data = players;
    data = searchTable(players, value);

    buildTable(data);
});


