var randomNumber = function(min, max) {
    return Math.random() * (max - min + 1) + min;
};
// let postCount = document.querySelector('.posts-count').getAttribute('data-count');
// let postImg = document.querySelector('.posts-count').getAttribute('data-img');

let img = 'img/cast_page-0001.jpg'
ymaps.ready(function() {
    var myMap = new ymaps.Map('map', {
        center: [55.751574, 37.573856],
        zoom: 10
    }, {
        searchControlProvider: 'yandex#search'
    });



    for (let i = 0; i < 6; i++) {
        myMap.geoObjects

            .add(new ymaps.Placemark([randomNumber(55, 55).toFixed(6), randomNumber(37, 37).toFixed(6)], {
            balloonContent: '<div><img style="width: 100%; margin-top: 2%" src="img/orig.jpg" alt=""></div>'
        }, {
            iconLayout: 'default#image',

            iconImageHref: 'img/taxi256px.png',

            iconImageSize: [48, 48],

            iconImageOffset: [-5, -38],
        }))


    }
});