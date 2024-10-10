import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

window.confirmDelete = function () {
    return confirm("Apakah Anda yakin ingin menghapus data ini?");
};
window.confirmUpdate = function () {
    return confirm("Apakah Anda yakin ingin finalisasi data ini?");
};
window.openCamera = function () {
    const video = document.getElementById("video");
    const takePhotoButton = document.getElementById("takePhotoButton");

    navigator.mediaDevices
        .getUserMedia({ video: true })
        .then((stream) => {
            video.srcObject = stream;
            video.classList.remove("hidden");
            takePhotoButton.classList.remove("hidden");
        })
        .catch((err) => {
            console.error("Error accessing camera: ", err);
        });
};

window.takePhoto = function () {
    const video = document.getElementById("video");
    const canvas = document.getElementById("canvas");
    const cameraImage = document.getElementById("camera_image");
    const fileInput = document.querySelector('input[name="pas_foto"]');
    const takePhotoButton = document.getElementById("takePhotoButton");

    const context = canvas.getContext("2d");
    context.drawImage(video, 0, 0, canvas.width, canvas.height);
    const dataURL = canvas.toDataURL("image/png");
    cameraImage.value = dataURL;
    video.classList.add("hidden");
    canvas.classList.remove("hidden");
    takePhotoButton.classList.add("hidden");

    // Convert dataURL to file and set it to the file input
    const file = dataURLtoFile(dataURL, "camera_image.png");
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(file);
    fileInput.files = dataTransfer.files;
};

function dataURLtoFile(dataurl, filename) {
    const arr = dataurl.split(",");
    const mime = arr[0].match(/:(.*?);/)[1];
    const bstr = atob(arr[1]);
    let n = bstr.length;
    const u8arr = new Uint8Array(n);
    while (n--) {
        u8arr[n] = bstr.charCodeAt(n);
    }
    return new File([u8arr], filename, { type: mime });
}

document.addEventListener("DOMContentLoaded", function () {
    const photo = document.querySelector("img");
    photo.addEventListener("mouseover", function () {
        this.classList.add("scale-110");
    });
    photo.addEventListener("mouseout", function () {
        this.classList.remove("scale-110");
    });
});
