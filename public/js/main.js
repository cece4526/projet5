import {Session} from './Session.js';
import {Caroussel} from './caroussel.js'
//let session = new Session;
//session.init();
let onReady = function(){
    new Caroussel(document.querySelector('#carousel1'), {
        slidesVisible: 1,
        loop: true,
        playauto: false
    });
};
/**if (document.readyState !== 'loading'){
    onReady()
};*/
document.addEventListener('DOMContentLoaded', onReady);
