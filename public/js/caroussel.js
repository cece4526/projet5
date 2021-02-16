export class Caroussel {
    /**
     * This callback type is called 'requestCallback' and is displayed as a global symbol.
     * 
     * @callback moveCallbacks
     * @param {number} index 
     */

    /**
     * 
     * @param {HTMLElement} element 
     * @param {object} options
     * @param {object} [options.slidesToScroll=1] Nombre d élément a faire défiler 
     * @param {object} [options.slidesVisible=1] Nombre d'élément visible dans un slide
     * @param {boolean} [options.loop=false] doit-on boucler en fin de slide
     * @param {boolean} [options.infinite=false]
     * @param {boolean} [options.pagination=false]
     * @param {boolean} [options.navigation=true] 
     */
    constructor (element, options = {}){
        this.element = element;
        this.options = Object.assign({}, {
            slidesToScroll: 1,
            slidesVisible: 1,
            loop: false,
            pagination: false,
            navigation: true,
            infinite: false,
            playauto: true
        }, options);       
        let children = [].slice.call(element.children);
        this.animations = true;
        this.isMobile = false;
        this.currentItem = 0;
        this.moveCallbacks = [];
        this.offset = 0;
        // Modification du DOM
        this.root = this.createDivWidthClass('carousel');
        this.container = this.createDivWidthClass('carousel__container');
        this.root.setAttribute('tabindex', '0');
        this.root.appendChild(this.container);
        this.element.appendChild(this.root);
        this.items = children.map((child) =>{
            let item = this.createDivWidthClass('carousel__item');
            item.appendChild(child);
            return item;
        });
        if (this.options.infinite){
            this.animations = false;
            this.offset = this.options.slidesVisible * 2 -1;
            this.items = [
                ...this.items.slice(this.items.length - this.offset).map(item => item.cloneNode(true)),
                ...this.items,
                ...this.items.slice(0,this.offset).map(item => item.cloneNode(true))
            ]
            this.gotoItem(this.offset, this.animations);
        }
        this.items.forEach(item => this.container.appendChild(item))
        this.setStyle();
        if (this.options.navigation){
            this.createNavigation();
        }
        if (this.options.pagination){
            this.createPagination();
        }
        // Evenements
        this.moveCallbacks.forEach(cb => cb(this.currentItem));
        this.onWindowresize();
        window.addEventListener('resize', this.onWindowresize.bind(this));
        this.root.addEventListener('keyup', e => {
            if(e.key === 'ArrowRight' || e.key === 'Right'){
                this.next();
            }else if(e.key === 'ArrowLeft' || e.key === 'Left'){
                this.prev();
            }
        })
        if (this.options.infinite){
            this.container.addEventListener('transitionend', this.resetinfinite.bind(this))
        }
        this.autoplay();
        if (this.options.playauto){
            this.play();
        }    
    }
    /**
     * Applique les bonne dimensions aux élément du carousel
     */
    setStyle () {
        let ratio = this.items.length / this.slidesVisible;
        this.container.style.width = (ratio * 100) + "%";
        this.items.forEach(item =>  item.style.width = ((100 / this.slidesVisible) / ratio) + "%");
    };
    /**
     * crée les fléche de navigation
     */
    createNavigation(){
        let nextButton = this.createDivWidthClass('carousel__next');
        let prevButton = this.createDivWidthClass('carousel__prev');
        this.root.appendChild(nextButton);
        this.root.appendChild(prevButton);
        nextButton.addEventListener('click', this.next.bind(this));
        prevButton.addEventListener('click', this.prev.bind(this));
        if (this.options.loop === true){
            return;
        };
        this.onMove(index =>{
            if (index === 0){
                prevButton.classList.add('carousel__prev--hidden');
            } else{
                prevButton.classList.remove('carousel__prev--hidden');
            }
            if (this.items[this.currentItem + this.slidesVisible ] === undefined){
                nextButton.classList.add('carousel__next--hidden');
            }else{
                nextButton.classList.remove('carousel__next--hidden');
            }
        });
    };
    /**
     * crée la pagination 
     */
    createPagination(){
        let pagination = this.createDivWidthClass('carousel__pagination');
        let buttons = [];
        this.root.appendChild(pagination);
        for(let i = 0; i < (this.items.length - 2 * this.offset); i = i+ this.options.slidesToScroll){
            let button = this.createDivWidthClass('carousel__pagination__button');
            button.addEventListener('click', () => this.gotoItem(i + this.offset));
            pagination.appendChild(button);
            buttons.push(button);
        }
        this.onMove(index => {
            let activeButton = buttons[Math.floor((index - this.offset) / this.options.slidesToScroll)];
            if(activeButton){
                buttons.forEach(button => button.classList.remove('carousel__pagination__button--active'));
                activeButton.classList.add('carousel__pagination__button--active');
            }
        })
    };
    next () {
        this.gotoItem(this.currentItem + this.slidesToScroll, this.animations);
    };
    prev(){
        this.gotoItem(this.currentItem - this.slidesToScroll, this.animations);
    };
    /** 
     * déplace le carousel vers l élément ciblé
     * @param {number} index
     * @param {boolean} [animation = true]
    */
    gotoItem (index, animation = true){
        if (index < 0) {
            if(this.options.loop){
            index = this.items.length - this.slidesVisible;
            }else {
                return;
            }
        }
        else if(index >= this.items.length || (this.items[this.currentItem + this.slidesVisible ] === undefined && index > this.currentItem)){
            if (this.options.loop){
                index = 0;
           }else{
               return;
           }
        };
        let translatex = index * -100 / this.items.length;
        if(animation === false){
            this.container.style.transition = 'none';
        }
        this.container.style.transform = 'translate3d('+translatex+'%, 0, 0)';
        this.container.offsetHeight; // force le repaint
        if(animation === false){
            this.container.style.transition = '';
        }
        this.currentItem = index;
        this.moveCallbacks.forEach(cb => cb(index));
    };
    //création des bouttons play pause plus ecoute des bouttons
    autoplay (){
        this.playButton = this.createDivWidthClass('carousel__play');
        this.pauseButton = this.createDivWidthClass('carousel__pause');
        this.root.appendChild(this.playButton);
        this.root.appendChild(this.pauseButton);
        this.pauseButton.addEventListener('click', this.pause.bind(this));
        this.playButton.addEventListener('click', this.play.bind(this));
    };
    //fonction play du slide
    play (){
            this.auto = setInterval(this.next.bind(this), 5000);
            this.options.playauto = true;
    };
    //fonction pause du slide
    pause (){
        this.options.playauto = false;
        clearInterval(this.auto);
        return(this.options.playauto);  
    };
    /**
     * déplacer le container pour donner l effet d infinis
     */
    resetinfinite (){
        if (this.currentItem <= this.options.slidesToScroll){
            this.gotoItem(this.currentItem + (this.items.length - 2 * this.offset), false)
        }
        else if(this.currentItem >= this.items.length - this.offset){
            this.gotoItem(this.currentItem - (this.items.length - 2 * this.offset), false)
        }
    };
    /**
    * @param {moveCallbacks} cb 
    */
    onMove (cb) {
        this.moveCallbacks.push(cb); 
    };
    onWindowresize (){
        let mobile = window.innerWidth < 800;
        if (mobile !== this.isMobile){
            this.isMobile = mobile;
            this.setStyle()
            this.moveCallbacks.forEach(cb => cb(this.currentItem));
        };
    };
    /**
     * @param {string} className
     * @returns {HTMLElement}
    */
    createDivWidthClass (className) {
            let div = document.createElement('div');
            div.setAttribute('class', className);
            return div;
    };
    /** 
     * @returns{number}
     */
    get slidesToScroll (){
        return this.isMobile ? 1 : this.options.slidesToScroll;
    };
    get slidesVisible (){
        return this.isMobile ? 1 : this.options.slidesVisible;
    }; 
};
