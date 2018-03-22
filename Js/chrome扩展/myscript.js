alert("正在替换当前页面");
var a = document.getElementsByClassName("uk-navbar");
if (a.length > 0) {
    console.log(a[0].innerHTML = "");
}

var hoop = document.getElementsByClassName("hp-header");
if (hoop.length > 0) {
    console.log(hoop[0].innerHTML = "");
}
var showPlate = document.getElementsByClassName("showPlate");
if (showPlate.length > 0) {
    console.log(showPlate[0].innerHTML = "");
}
var bbs_head = document.getElementsByClassName("bbs_head");
if (bbs_head.length > 0) {
    console.log(bbs_head[0].innerHTML = "");
}
var page_header = document.getElementsByClassName("PageHeader");
if (page_header.length > 0) {
    console.log(page_header[0].innerHTML = "");
}

