/*class comment{
    constructor(){
        this.xhr = new XMLHttpRequest();
        debugger;
        this.commentPseudo = document.getElementById("commentPseudo");
        this.commentContent = document.getElementById("commentContent");
        this.commentDate = document.getElementById("commentDate");
        document.getElementById("submit").addEventListener("click", (e) =>{
            e.preventDefault();
            debugger;
            this.requete
            return false;
        });
    }
    requete(fichier) {
        this.xhr.onreadystatechange = function() {
            if(this.readystate == 4 && this.status == 200){
            console.log(this);
        }else if(this.readystate == 4 && this.status == 404){
            alert('Erreur 404');
        }
        this.xhr.open("GET", "C:/wamp64/www/P05_Dupre_Cedric/P05_code_source/templates/single.php");
        this.xhr.send();
    }
    /*function ecouteRequete() {
        document.getElementById("formComment").addEventListener("submit", (e) =>{
            e.preventDefault();
            debugger;
            this.requete
            return false;
        });
    }
}*/
var submit = document.getElementById("submit")
submit.addEventListener("mouseclick", function(e) {
    e.preventDefault();
    console.log('oui');
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        console.log(this);
    };

    xhr.open("GET", "http://localhost/P05_Dupre_Cedric/P05_code_source/public/index.php?route=addComment&bossId=9", true);
    xhr.send();
    return false;
})