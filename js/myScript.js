$(document).ready(function(){
    $("#addBtn").click(function(){
        var num = document.getElementById('num').innerHTML;
        var newNum = Number(num);
        $("table").append(" <tr><td align='center'>" + num + "</td><td><input type='text' name='duID" + newNum + "' class='form-control'>" +
          "</td><td><select class='form-control' name='subcon" + newNum + "'><option value='CME'>CME</option><option value='CME-F'>CME-Fiber</option>" +
          "<option value='Microwave'>Microwave</option><option value='RF'>RF</option><option value='TI'>" +
          "TI</option><option value='TSSR'>TSSR</option>" +
          "</select></td><td><input type='text' name='item" + newNum + "' class='form-control'></td></tr>");
        newNum += 1;
        document.getElementById('num').innerHTML = newNum;
        var test = "duID" + (newNum - 1);
        console.log(test);
        var elmnt = document.getElementsByName("duID" + (newNum - 1))[0];
        elmnt.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
    });
});
