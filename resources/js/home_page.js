copyLinkToBuffer = function () {
    var copyText = document.getElementById('home_link');
    navigator.clipboard.writeText(copyText.value);
};

luckyGen = function ($url) {
    fetch($url)
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            document.getElementById('points').textContent = data.points;
            document.getElementById('win_lose').textContent = data.win_lose;
            document.getElementById('win_summ').textContent = data.win_summ;
        });
};

luckyHistory = function ($url) {
    fetch($url)
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            var res = '';
            data.forEach(function (data) {
                res += 'Очков: ' + data.points + ', Win/Lose: ' + data.win_lose + ', Сумма: ' + data.win_summ + '<br>';
            });
            document.getElementById('history').innerHTML = res;
        });
};
