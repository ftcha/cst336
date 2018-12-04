$( document ).ready(function() {
    move();
    $('#btnMoveAnimals').css("user-select", "none");
});

$('#btnMoveAnimals').click(function() {
    move();
});

$('#btnMoveAnimals')
    .on("mouseenter", function() {
        $(this).css({
            "background-color": "yellow",
            "color": "black"
        });
    })
    .on("mouseleave", function() {
        $(this).css({
            "background-color": "#FFAA00",
            "color": "white"
        });
    });


function move() {
    var xCat = Math.floor(Math.random()*401);
    var yCat = Math.floor(Math.random()*201);
    var xDog = Math.floor(Math.random()*411);
    var yDog = Math.floor(Math.random()*201);
    var xBtn = Math.floor(Math.random()*411);
    var yBtn = Math.floor(Math.random()*201);
    
    document.getElementById('cat').style.left = xCat + 'px';
    document.getElementById('cat').style.top = yCat + 'px';
    document.getElementById('dog').style.left = xDog + 'px';
    document.getElementById('dog').style.top = yDog + 'px';
    document.getElementById('btnMoveAnimals').style.left = xBtn + 'px';
    document.getElementById('btnMoveAnimals').style.top = yBtn + 'px';
}