function showLoader() {
    var loader = document.querySelector('.pace');
    loader.classList.remove('d-none');
    loader.style.display = 'block';  // লোডারকে দেখানোর জন্য display পরিবর্তন
}
function hideLoader() {
    var loader = document.querySelector('.pace');
    loader.classList.add('d-none');
    loader.style.display = 'none';  // লোডারকে লুকানোর জন্য display পরিবর্তন
}