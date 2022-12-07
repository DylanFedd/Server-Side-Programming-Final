let merchContainer = document.getElementById("merchContainer");

fetch("php/getMerch.php")
.then(response => response.json())
.then(data => data.forEach(product => createProductContainer(product)));


function createProductContainer(product){
    let productContainer = document.createElement("div");
    productContainer.setAttribute("class","product");

    //left column of the row
    let imageColumn = document.createElement("div");
    imageColumn.setAttribute("class","productColumn");

    let productImage = document.createElement("img");
    productImage.setAttribute("class","productImage");
    productImage.setAttribute("src",`images/${product.ImgFileName}`);

    imageColumn.appendChild(productImage);
    productContainer.appendChild(imageColumn);

    //middle column of the row
    let detailColumn = document.createElement("div");
    detailColumn.setAttribute("class","productColumn");

    let productName = document.createElement("h1");
    productName.innerHTML = product.ProductName;

    let productPrice = document.createElement("p");
    productPrice.innerHTML = "$" + product.ProductPrice;

    let productDesc = document.createElement("p");
    productDesc.innerHTML = product.ProductDescription;

    detailColumn.appendChild(productName);
    detailColumn.appendChild(productPrice);
    detailColumn.appendChild(productDesc);
    productContainer.appendChild(detailColumn);

    //right column of the row
    let cartColumn = document.createElement("div");
    cartColumn.setAttribute("class","productColumn");

    productContainer.appendChild(cartColumn);

    //add product container to merch container
    merchContainer.appendChild(productContainer);
}