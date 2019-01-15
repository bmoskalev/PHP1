"use strict";

/**
 * @property {Object} settings Объект с настройками галереи.
 * @property {string} settings.previewSelector Селектор обертки для миниатюр галереи.
 * @property {string} settings.openedImageWrapperClass Класс для обертки открытой картинки.
 * @property {string} settings.openedImageClass Класс открытой картинки.
 * @property {string} settings.openedImageScreenClass Класс для ширмы открытой картинки.
 * @property {string} settings.openedImageCloseBtnClass Класс для картинки кнопки закрыть.
 * @property {string} settings.openedImageCloseBtnSrc Путь до картинки кнопки открыть.
 */
class Gallery {

    /**
     * Инициализирует галерею, ставит обработчик события.
     * @param {Object} userSettings Объект настроек для галереи.
     */
    constructor(userSettings = {}) {
        this.settings = {};
        this.settings.previewSelector = '.mySuperGallery';
        this.settings.openedImageWrapperClass = 'galleryWrapper';
        this.settings.openedImageClass = 'galleryWrapper__image';
        this.settings.openedImageScreenClass = 'galleryWrapper__screen';
        this.settings.openedImageCloseBtnClass = 'galleryWrapper__close';
        this.settings.openedImageCloseBtnSrc = 'img/gallery/close.png';
        this.settings.openedImageErrorSrc = 'img/gallery/nofoto.png';
        this.settings.openedImageBackBtnClass = 'galleryWrapper__back';
        this.settings.openedImageNextBtnClass = 'galleryWrapper__next';
        this.settings.openedImageBackBtnSrc = 'img/gallery/goleftarrow.png';
        this.settings.openedImageNextBtnSrc = 'img/gallery/gorightarrow.png';
        this.openedImageEl = null;
        Object.assign(this.settings, userSettings);
        document.querySelector(this.settings.previewSelector)
            .addEventListener('click', event => this.containerClickHandler(event));
    }


    /**
     * Наполняет содержимое блока с изображениями
     * @param data []. Массив с информацией о содержимом элементов img
     */
// render(data) {
//     let galleryBlock = document.querySelector(this.settings.previewSelector);
//     let result = "";
//     for (const item of data) {
//         const img = new Image();
//         img.src = item.src;
//         img.dataset.full_image_url = item.full_image_src;
//         img.alt = item.alt;
//         galleryBlock.appendChild(img);
//         //result+=`<img src=${item.src} data-full_image_url=${item.full_image_src} alt=${item.alt}>`;
//     }
//     //galleryBlock.innerHTML=result;
// },

    /**
     * Обработчик события клика для открытия картинки.
     * @param {MouseEvent} event Событие клики мышью.
     * @param {HTMLElement} event.target Целевой объект, куда был произведен клик.
     */
    containerClickHandler(event) {
        // Если целевой тег не был картинкой, то ничего не делаем, просто завершаем функцию.
        if (event.target.tagName !== 'IMG') {
            return;
        }
        this.openedImageEl = event.target;
        // Открываем картинку с полученным из целевого тега (data-full_image_url аттрибут).
        this.openImage(event.target.dataset.full_image_url);
    }


    /**
     * Открывает картинку.
     * @param {string} src Ссылка на картинку, которую надо открыть.
     */
    openImage(src) {
        // Получаем контейнер для открытой картинки, в нем находим тег img и ставим ему нужный src.
        this.getScreenContainer().querySelector(`.${this.settings.openedImageClass}`).src = src;
    }


    /**
     * Возвращает контейнер для открытой картинки, либо создает такой контейнер, если его еще нет.
     * @returns {Element}
     */
    getScreenContainer() {
        // Получаем контейнер для открытой картинки.
        const galleryWrapperElement = document.querySelector(`.${this.settings.openedImageWrapperClass}`);
        // Если контейнер для открытой картинки существует - возвращаем его.
        if (galleryWrapperElement) {
            return galleryWrapperElement;
        }

        // Возвращаем полученный из метода createScreenContainer контейнер.
        return this.createScreenContainer();
    }


    /**
     * Создает контейнер для открытой картинки.
     * @returns {HTMLElement}
     */
    createScreenContainer() {
        // Создаем сам контейнер-обертку и ставим ему класс.
        const galleryWrapperElement = document.createElement('div');
        galleryWrapperElement.classList.add(this.settings.openedImageWrapperClass);

        // Создаем картинку для кнопки назад, ставим класс, src и добавляем ее в контейнер-обертку.
        const backImageElement = new Image();
        backImageElement.classList.add(this.settings.openedImageBackBtnClass);
        backImageElement.src = this.settings.openedImageBackBtnSrc;
        backImageElement.addEventListener('click', () => this.backImage());
        galleryWrapperElement.appendChild(backImageElement);

        // Создаем картинку для кнопки впреред, ставим класс, src и добавляем ее в контейнер-обертку.
        const nextImageElement = new Image();
        nextImageElement.classList.add(this.settings.openedImageNextBtnClass);
        nextImageElement.src = this.settings.openedImageNextBtnSrc;
        nextImageElement.addEventListener('click', () => this.nextImage());
        galleryWrapperElement.appendChild(nextImageElement);

        // Создаем контейнер занавеса, ставим ему класс и добавляем в контейнер-обертку.
        const galleryScreenElement = document.createElement('div');
        galleryScreenElement.classList.add(this.settings.openedImageScreenClass);
        galleryWrapperElement.appendChild(galleryScreenElement);

        // Создаем картинку для кнопки закрыть, ставим класс, src и добавляем ее в контейнер-обертку.
        const closeImageElement = new Image();
        closeImageElement.classList.add(this.settings.openedImageCloseBtnClass);
        closeImageElement.src = this.settings.openedImageCloseBtnSrc;
        closeImageElement.addEventListener('click', () => this.close());
        galleryWrapperElement.appendChild(closeImageElement);

        // Создаем картинку, которую хотим открыть, ставим класс и добавляем ее в контейнер-обертку.
        const image = new Image();
        image.classList.add(this.settings.openedImageClass);
        image.onerror = () => image.src = gallery.settings.openedImageErrorSrc;
        galleryWrapperElement.appendChild(image);

        // Добавляем контейнер-обертку в тег body.
        document.body.appendChild(galleryWrapperElement);

        // Возвращаем добавленный в body элемент, наш контейнер-обертку.
        return galleryWrapperElement;
    }


    /**
     * Закрывает (удаляет) контейнер для открытой картинки.
     */
    close() {
        document.querySelector(`.${this.settings.openedImageWrapperClass}`).remove();
        this.openedImageEl = null;
    }


    /**
     * Отображает предыдущую картинку
     */
    backImage() {
        this.openedImageEl = this.getPrevImage();
        this.openImage(this.openedImageEl.dataset.full_image_url);
    }


    /**
     * Отображает следующую картинку
     */
    nextImage() {
        this.openedImageEl = this.getNextImage();
        this.openImage(this.openedImageEl.dataset.full_image_url);
    }


    /**
     * Возвращает объект с картинкой предыдущей текущей картинке
     * @returns {Element} Объект с предыдущей картинкой
     */
    getPrevImage() {
        if (this.openedImageEl.previousElementSibling === null) {
            return this.openedImageEl.parentNode.lastElementChild;
        } else {
            return this.openedImageEl.previousElementSibling;
        }
    }


    /**
     * Возвращает объект с картинкой следующей текущей картинке
     * @returns {Element} Объект со следующей картинкой
     */
    getNextImage() {
        if (this.openedImageEl.nextElementSibling === null) {
            return this.openedImageEl.parentNode.firstElementChild;
        } else {
            return this.openedImageEl.nextElementSibling;
        }
    }


}

