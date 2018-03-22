$(document).ready(function () {
    $("button").click(function () {
        console.log(1)
    });
    setInterval(function () {
        $("button").trigger("click")
    }, 1000)
})
