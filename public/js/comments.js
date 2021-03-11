var pseudo = document.getElementById('pseudoCom');
var result = document.getElementById('contentCom');
var form = document.getElementById("formComment");
var date = document.getElementById("dateCom");
form.addEventListener("submit", function(e) {
    e.preventDefault();
    result.innerHTML = 'chargement...';
    var data = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4){
            if(xhr.status === 200){
                console.log(this.response);
                pseudo.innerHTML= this.response.author;
                result.innerHTML = this.response.content;
                date.innerHTML = "posté a l'instant.";
            }
            else{
                alert('impossible de contacté le serveur');
            }   
        }
    };
    xhr.open("POST", form.getAttribute('action'), true);
    xhr.responseType = "json";
    xhr.send(data);
    return false;
})