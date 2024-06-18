const addBox = document.querySelector(".add-box"),
    popupBox = document.querySelector(".popup-box"),
    popupTitle = popupBox.querySelector("header p"),
    closeIcon = popupBox.querySelector("header i"),
    titleTag = popupBox.querySelector("input"),
    descTag = popupBox.querySelector("textarea"),
    addBtn = popupBox.querySelector("button"),
    noteForm = document.getElementById("noteForm"),
    noteIdInput = document.getElementById("noteId"),
    methodInput = document.getElementById("method");

let isUpdate = false;

const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
];

addBox.addEventListener("click", () => {
    popupTitle.innerText = "Add a new Note";
    addBtn.innerText = "Add Note";
    popupBox.classList.add("show");
    document.querySelector("body").style.overflow = "hidden";
    if (window.innerWidth > 660) titleTag.focus();
});

closeIcon.addEventListener("click", () => {
    isUpdate = false;
    titleTag.value = descTag.value = "";
    popupBox.classList.remove("show");
    document.querySelector("body").style.overflow = "auto";
});

function showMenu(elem) {
    elem.parentElement.classList.add("show");
    document.addEventListener("click", (e) => {
        if (e.target.tagName != "I" || e.target != elem) {
            elem.parentElement.classList.remove("show");
        }
    });
}

function updateNote(id, title, content) {
    document.querySelector(`#updatePopup${id}`).classList.add("show");
    document.querySelector(`#updateTitle${id}`).value = title;
    document.querySelector(`#updateContent${id}`).value = content;
}

function showPopup(popupId) {
    document.getElementById(popupId).classList.add("show");
}

function closePopup(popupId) {
    document.getElementById(popupId).classList.remove("show");
}
