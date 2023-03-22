document.addEventListener("DOMContentLoaded", function () {
    const dropdownBtn = document.querySelector(".options-btn");
    const dropdownMenu = document.querySelector(".dropdown-menu");
    const container = document.querySelector("body"); // Remplacez ".container" par le sélecteur de votre conteneur parent
    dropdownBtn.addEventListener("click", function () {
        dropdownMenu.style.display = dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '' ? 'block' : 'none';
    });

    container.addEventListener("click", function (event) {
        if (!dropdownMenu.contains(event.target) && !dropdownBtn.contains(event.target)) {
            dropdownMenu.style.display = 'none';
        }
    });
});

// Upload
$(function () {
    $('.upload-cv-option').click(function () {
        $('#inputFileUpload').click();
    });
});

// Update
$(function () {
    $('.update-cv-option').click(function () {
        $('#inputFileUpdate').click();
    });
});

// Delete
$(document).ready(function () {
    $('.delete-cv-option').click(function () {
        $('#file-delete-form').submit();
    });
});

$(document).ready(function () {
    // Upload
    $('#inputFileUpload').change(function () {
        $('#file-upload-form').submit();
    });
});

$(document).ready(function () {
    // Update
    $('#inputFileUpdate').change(function () {
        $('#file-update-form').submit();
    });
});

$(document).ready(function () {
    // Upload pp
    $('#inputPPUpload').change(function () {
        $('#pp-upload-form').submit();
    });
});