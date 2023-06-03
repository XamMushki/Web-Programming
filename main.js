var sno = 1;
function submitDetails() {
    let fname = document.getElementById("input_fname").value.trim();
    let lname = document.getElementById("input_lname").value.trim();
    let address = document.getElementById("input_address").value.trim();
    let email = document.getElementById("input_email").value.trim();
    let phone = document.getElementById("input_phone").value.trim();
    let dob = document.getElementById("input_dob").value;

    let genderS = document.getElementsByName("gender");
    let qual = document.getElementsByName("qualification");
    let table = document.getElementById("data_table");
    let gender = '';

    console.log(address.length);

    for (var i = 0; i < genderS.length; i++) {
        if (genderS[i].checked) {
            gender = genderS[i].value;
        }
    }

    let qualification = '';
    for (var i = 0; i < qual.length; i++) {
        if (qual[i].checked) {
            if (!qualification) {
                qualification = qual[i].value;
            }
            else {
                qualification += ", " + qual[i].value;
            }
        }
    }
    // if qualification is not provided.
    if (!qualification) {
        qualification = "-";
    }
    console.log(phone);
    if (fname && lname && address && email && phone.length == 10 &&
        dob && gender) {
        let name = fname + " " + lname;
        var new_row = table.insertRow(-1);
        var cell_sno = new_row.insertCell(0);
        var cell_name = new_row.insertCell(1);
        cell_sno.innerHTML = sno;
        cell_name.innerHTML = name;

        // the above can also be done as:
        new_row.insertCell(2).innerHTML = address;
        new_row.insertCell(3).innerHTML = email;
        new_row.insertCell(4).innerHTML = phone;
        new_row.insertCell(5).innerHTML = dob;
        new_row.insertCell(6).innerHTML = gender;
        new_row.insertCell(7).innerHTML = qualification;

        document.getElementById("input_fname").value = '';
        document.getElementById("input_lname").value = '';
        document.getElementById("input_address").value = '';
        document.getElementById("input_email").value = '';
        document.getElementById("input_phone").value = '';
        document.getElementById("input_dob").value = '';

        sno += 1;
    }
}