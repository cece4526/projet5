var pseudo = document.getElementById('pseudoCom');
var result = document.getElementById('contentCom');
var submit = document.getElementById("formComment");
//submit.addEventListener("submit", function(e) {
    e.preventDefault();
    result.innerHTML = 'chargement...';
    var data = new FormData(this);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4){
            if(xhr.status === 200){
                console.log(this.response);
                pseudo.innerHTML= xhr;
            }
            alert('impossible de contacté le serveur');
        }
    };
    xhr.open("POST", "http://localhost/P05_Dupre_Cedric/P05_code_source/public/index.php?route=addComment", true);
    xhr.responseType = "json";
    xhr.send();
    return false;
})