fetch('php/verifyAuth.php')
.then(response => response.json())
.then(function(data){
    if(data.auth){
        navDisplay(data);
    }
});

signOutBtn.onclick = function(){
    fetch('php/signout.php')
    //refreshes the page
    .then(function(){
        location.reload();
    });
}

function navDisplay(data){
    let contentDiv = document.getElementById("content");
    let signOutBtn = document.getElementById("signOutBtn");
    let signUpLink = document.getElementById("signUpLink");
    let signInLink = document.getElementById("signInLink");
    let checkOutPage = document.getElementById("checkOutPage")
    let notSignedInPage = document.getElementById("notSignedInPage")

    contentDiv.innerHTML = "Welcome back: " + data.username;
    signOutBtn.style.display = "block";
    let adminPageLink = document.getElementById("adminPageLink");
    if(data.isAdmin){
        adminPageLink.style.display = "block";
    }
    signUpLink.style.display = "none";
    signInLink.style.display = "none";

    if(checkOutPage != null){
        checkOutPage.style.display = "block";
        notSignedInPage.style.display = "none"
    }
}