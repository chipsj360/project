function onSubmitDetails(event) {
    username = document.getElementById("inputusername").value;
    password = document.getElementById("inputpassword").value;
    let alertBox = document.getElementById("AlertBox");
    if (username == "") {
        event.preventDefault();
        let alertBox = document.getElementById("AlertBox");
        alertBox.innerHTML = "Please Enter Username!";
        alertBox.style.display = "unset";
    } else if (password == "") {
        event.preventDefault();
        let alertBox = document.getElementById("AlertBox");
        alertBox.innerHTML = "Please Enter Password!";
        alertBox.style.display = "unset";
    }

    alertBox.style.display = "unset";

}