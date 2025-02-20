let general_data, contacts_data;

// Function to reset modal inputs to their original values
function reset_modal_inputs() {
    document.getElementById('site_title_inp').value = general_data.site_title;
    document.getElementById('site_about_inp').value = general_data.site_about;

}

// Function to fetch general settings
function get_general() {
    let site_title = document.getElementById('site_title');
    let site_about = document.getElementById('site_about');
    let site_title_inp = document.getElementById('site_title_inp');
    let site_about_inp = document.getElementById('site_about_inp');
    let shutdown_toggle = document.getElementById('shutdown-toggle');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (this.status === 200) {
            try {
                general_data = JSON.parse(this.responseText);
                site_title.innerText = general_data.site_title;
                site_about.innerText = general_data.site_about;
                site_title_inp.value = general_data.site_title;
                site_about_inp.value = general_data.site_about;
                shutdown_toggle.checked = general_data.shutdown == 1;
            } catch (e) {
                console.error("Error parsing response:", this.responseText);
            }
        } else {
            console.error("Error fetching general settings.");
        }
    };

    xhr.send("action=get_general");
}

// Function to update general settings
function upd_general() {
    let site_title_val = document.getElementById('site_title_inp').value;
    let site_about_val = document.getElementById('site_about_inp').value;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (this.status === 200) {
            try {
                let response = JSON.parse(this.responseText);
                if (response.success) {
                    console.log("General settings updated successfully.");
                    get_general();
                    let modal = bootstrap.Modal.getInstance(document.getElementById('general-settings-modal'));
                    if (modal) modal.hide();
                } else {
                    console.error("Failed to update settings:", response.message);
                }
            } catch (e) {
                console.error("Error parsing response:", this.responseText);
            }
        } else {
            console.error("Error updating general settings.");
        }
    };

    xhr.send(`action=upd_general&site_title=${encodeURIComponent(site_title_val)}&site_about=${encodeURIComponent(site_about_val)}`);
}

// Function to update shutdown status
function upd_shutdown(status) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (this.status === 200) {
            try {
                let response = JSON.parse(this.responseText);
                if (response.success) {
                    console.log("Shutdown status updated successfully.");
                } else {
                    console.error("Failed to update shutdown status:", response.message);
                }
            } catch (e) {
                console.error("Error parsing response:", this.responseText);
            }
        } else {
            console.error("Error updating shutdown status.");
        }
    };

    xhr.send(`action=upd_shutdown&shutdown=${status}`);
}


function reset_modal_inputs() {
let contacts_inp_id = {
    address_inp: document.getElementById('address').innerText,
    gmap_inp: document.getElementById('gmap').innerText,
    pn1_inp: document.getElementById('pn1').innerText,
    pn2_inp: document.getElementById('pn2').innerText,
    fb_inp: document.getElementById('fb').innerText,
    insta_inp: document.getElementById('insta').innerText,
    tw_inp: document.getElementById('tw').innerText,
    iframe_inp: document.getElementById('iframe').src
};

for (let id in contacts_inp_id) {
    if (document.getElementById(id)) {
        document.getElementById(id).value = contacts_inp_id[id] || '';
    }
}
}

function get_contacts() {
let xhr = new XMLHttpRequest();
xhr.open("POST", "ajax/settings_crud.php", true);
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

xhr.onload = function () {
    if (this.status === 200) {
        try {
            let contacts_data = JSON.parse(this.responseText);

            if (contacts_data.error) {
                console.error(contacts_data.error);
                return;
            }

            // Update display fields
            document.getElementById('address').innerText = contacts_data.address || 'N/A';
            document.getElementById('gmap').innerText = contacts_data.gmap || 'N/A';
            document.getElementById('pn1').innerText = contacts_data.pn1 || 'N/A';
            document.getElementById('pn2').innerText = contacts_data.pn2 || 'N/A';
            document.getElementById('fb').innerText = contacts_data.fb || 'N/A';
            document.getElementById('insta').innerText = contacts_data.insta || 'N/A';
            document.getElementById('tw').innerText = contacts_data.tw || 'N/A';

            // Set iframe source
            document.getElementById('iframe').src = contacts_data.iframe || "about:blank";

            // Update modal fields
            contacts_inp(contacts_data);
        } catch (e) {
            console.error("Error parsing response:", this.responseText);
        }
    }
};

xhr.onerror = function () {
    console.error("Network error.");
};

xhr.send("action=get_contacts");
}

function contacts_inp(contacts_data) {
let contacts_inp_id = {
    address_inp: contacts_data.address,
    gmap_inp: contacts_data.gmap,
    pn1_inp: contacts_data.pn1,
    pn2_inp: contacts_data.pn2,
    fb_inp: contacts_data.fb,
    insta_inp: contacts_data.insta,
    tw_inp: contacts_data.tw,
    iframe_inp: contacts_data.iframe
};

for (let id in contacts_inp_id) {
    if (document.getElementById(id)) {
        document.getElementById(id).value = contacts_inp_id[id] || '';
    }
}
}

// Function to update contact settings
function upd_contacts() {
let address_val = document.getElementById('address_inp').value;
let gmap_val = document.getElementById('gmap_inp').value;
let pn1_val = document.getElementById('pn1_inp').value;
let pn2_val = document.getElementById('pn2_inp').value;
let fb_val = document.getElementById('fb_inp').value;
let insta_val = document.getElementById('insta_inp').value;
let tw_val = document.getElementById('tw_inp').value;
let iframe_val = document.getElementById('iframe_inp').value;

let xhr = new XMLHttpRequest();
xhr.open("POST", "ajax/settings_crud.php", true);
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

xhr.onload = function () {
    if (this.status === 200) {
        try {
            let response = JSON.parse(this.responseText);
            if (response.success) {
                console.log("Contact settings updated successfully.");
                get_contacts(); // Refresh contact settings
                let modal = bootstrap.Modal.getInstance(document.getElementById('contacts-settings-modal'));
                if (modal) modal.hide();
            } else {
                console.error("Failed to update contact settings:", response.message);
            }
        } catch (e) {
            console.error("Error parsing response:", this.responseText);
        }
    } else {
        console.error("Error updating contact settings.");
    }
};

xhr.send(`action=upd_contacts&address=${encodeURIComponent(address_val)}&gmap=${encodeURIComponent(gmap_val)}&pn1=${encodeURIComponent(pn1_val)}&pn2=${encodeURIComponent(pn2_val)}&fb=${encodeURIComponent(fb_val)}&insta=${encodeURIComponent(insta_val)}&tw=${encodeURIComponent(tw_val)}&iframe=${encodeURIComponent(iframe_val)}`);
}


// Initialize settings on page load
window.onload = function () {
    get_general();
    get_contacts();
};