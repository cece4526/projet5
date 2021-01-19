export class Session{
    constructor(){
        this.login = document.getElementById('login');
        this.dataSession = {};
    }
    init(){
        this.loginSave();
        this.preremplir();
    }
    loginSave(){
        if(!sessionStorage){
            return false;
        }
        this.login.addEventListener("keyup",() =>{
            this.dataSession['Login'] = this.login.value;
            localStorage.setItem('Login' ,this.login.value);
        });
    }
    preremplir(){
        let dataStorage = localStorage.getItem('Login');
        if(dataStorage != undefined){
                this.login.value = dataStorage;
        }
    }
}