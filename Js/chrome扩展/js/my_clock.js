function my_clock(el){
    var today=new Date();
    var h=today.getHours();
    var m=today.getMinutes();
    var s=today.getSeconds();
	var micos=today.getUTCMilliseconds();
    m=m>=10?m:('0'+m);
    s=s>=10?s:('0'+s);
    el.innerHTML = h+":"+m+":"+s+":"+micos;
    //setTimeout(function(){my_clock(el)}, 1000);
    setTimeout(function(){my_clock(el)}, 1);
	console.log(123);
}

var clock_div = document.getElementById('clock_div');
my_clock(clock_div);
