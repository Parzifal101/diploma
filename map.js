var randomNumber = function(min, max) {
    return Math.random() * (max - min + 1) + min;
};
let img = 'img/cast_page-0001.jpg'
ymaps.ready(function() {
    var myMap = new ymaps.Map('map', {
        center: [55.751574, 37.573856],
        zoom: 10
    }, {
        searchControlProvider: 'yandex#search'
    });


    myMap.geoObjects

        .add(new ymaps.Placemark([randomNumber(55, 55).toFixed(6), randomNumber(37, 37).toFixed(6)], {
            balloonContent: '<div><img style="width: 100%; margin-top: 2%" src="img/orig.jpg" alt=""></div>'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'img/taxi256px.png',
            // Размеры метки.
            iconImageSize: [48, 48],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-5, -38],
        }))
        .add(new ymaps.Placemark([randomNumber(55, 55).toFixed(6), randomNumber(37, 37).toFixed(6)], {
            balloonContent: '<div><img style="width: 100%; margin-top: 2%" src="img/5_registraciya.jpeg" alt=""></div>'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'img/taxi256px.png',
            // Размеры метки.
            iconImageSize: [48, 48],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-5, -38],
        }))
        .add(new ymaps.Placemark([randomNumber(55, 55).toFixed(6), randomNumber(37, 37).toFixed(6)], {
            balloonContent: '<div><img style="width: 100%; margin-top: 2%" src="img/bnr_cont_ya_ggl.jpg" alt=""></div>'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'img/taxi256px.png',
            // Размеры метки.
            iconImageSize: [48, 48],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-5, -38],
        }))

});



//Добавить динамическое отображение авто через AJAX;
//Сделать анимацию перемещения???;