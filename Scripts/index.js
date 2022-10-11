"use strict";
function ScrollToTop() {
    let element = document.getElementById("top");
    if (element != null) {
        element.scrollIntoView();
    }
}
function ScrollToMiddle() {
    let element = document.getElementById("middle");
    if (element != null) {
        element.scrollIntoView();
    }
}
function ScrollToBottom() {
    let element = document.getElementById("bottom");
    if (element != null) {
        element.scrollIntoView();
    }
}
function OpenLegalDetails() {
    window.location.href = "LegalDetails.html";
}
function SendEmail() {
    window.open('mailto:lukas@lna-dev.net');
}
