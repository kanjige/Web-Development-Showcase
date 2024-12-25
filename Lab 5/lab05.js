function format(event) {
    event.preventDefault();

    let name = document.forms["form_input"]["name"].value;
    let address = document.forms["form_input"]["address"].value;
    let phone = document.forms["form_input"]["phone"].value;

    let name_format = /^[a-zA-Z]+$/;

    if (name.trim() == "") {
        alert("Invalid Name Field.");
        return false;
    } 
    if (!name_format.test(name.trim())) {
        alert("Invalid Name Field. Letters Only.");
        return false;
    } 
    if (address == "") {
        alert("Invalid Address Field");
        return false;
    }

    let phone_format = /^\((\d{3})\) (\d{3})-(\d{4})$/;

    if (!phone_format.test(phone)) {
        alert("Invalid Phone Number Field. Use (###) ###-####.");
        return false;
    }

    let new_phone = phone.replace(phone_format, "$1-$2-$3");

    const form_output = document.getElementById("form_output");
    form_output.innerHTML = `
        Customer Name: ${name} <br>
        Shipping Address: ${address} <br>
        Phone Number: ${new_phone} <br>
        Email: ${name.toLowerCase()}@carfreak.com<br><br>
        Orders: <br>
            <u1>
            <li>Banana Costume</li>
            <li>Spare Honda Civic Exhaust Pipe</li>
            <li>Motor Oil</li>
            <li>Energy Supplements</li>
            <li>Towel</li>
            </u1>
        `;
}





function stringLength() {
    const str = document.getElementById("strlen_input").value;
    const filter_str = str.replace(/[^a-zA-Z]/g, '');

    const len = str.length;
    const filter_len = filter_str.length;

    const strlen_output = document.getElementById("strlen");
    const filterlen_output = document.getElementById("filterlen");
    

    strlen_output.innerHTML = "String Length: " + len;
    filterlen_output.innerHTML = "String Length (Letters Only): " + filter_len;

}


