var timer = null;
function startTimer() {
  if (timer)
    return;
    
  timer = setInterval(function() {
    var a = [];
    for (var i = 100; i <= 999; i++)
      a.push(i);
    a.sort(function() { return Math.random() - 0.5; });
    //console.log(JSON.stringify(a));

    var table = $('table');
    table.empty();

    var index = 0;
    for (r = 0; r < 20; ++r) {
      var row = $('<tr>');
      for (c = 0; c < 20; ++c) {
        row.append('<td>' + a[index++] + '</td>');
      }
      table.append(row);
    }
  }, 200);
}
function stopTimer() {
  clearInterval(timer);
  timer = null;
}
startTimer();

