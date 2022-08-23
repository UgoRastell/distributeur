document.getElementById("myForm").addEventListener("submit", function(e) {
    var erreur;
    var inputs = document.getElementsByTagName("input");

    for (var i = 0; i < inputs.length; i++) {
        if(!inputs[i].value){
            erreur = "Veuillez vérifier tous les champs"
        }
    }

    if(erreur){
        e.preventDefault();
        document.getElementById("erreur").innerHTML = erreur;
        return false;
    }else{
        header('location:achat.php');
    }
});

