
const propertyForm = document.querySelector("#propertyForm");

propertyForm.addEventListener("submit", e => {
    e.preventDefault();

    // console.log(
    //     propertyForm["pago_total"].value
    // )
    App.createProperty(
        propertyForm["propietarioCi"].value,
        propertyForm["newproperty"].value,
        propertyForm["price"].value,
        propertyForm["propertyId"].value,
        propertyForm["servicios"].value,
        propertyForm["superficie"].value,
        propertyForm["longitud"].value,
        propertyForm["latitud"].value,
        propertyForm["zona"].value,
    );

})
