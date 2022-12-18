var contentDiv = document.getElementById("content");
var signOutBtn = document.getElementById("signOutBtn");

fetch('php/verifyAuth.php')
.then(response => response.json())
.then(function(data){
    if(data.auth){
        contentDiv.innerHTML = "Welcome back: " + data.username;
        signOutBtn.style.display = "block";
    }
    else{
        contentDiv.innerHTML = "Please sign up/log in."
    }
});

signOutBtn.onclick = function(){
    fetch('php/signout.php')
    //refreshes the page
    .then(function(){
        location.reload();
    });
}