const setClass = (index) => {
    const band = document.querySelectorAll('#artist-card');
    if(band[index].classList.contains('artist-card-heading')) {
        band[index].classList.remove('artist-card-heading');
        band[index].classList.add('artist-card-content');
    } else if (band[index].classList.contains('artist-card-content')){
        band[index].classList.remove('artist-card-content');
        band[index].classList.add('artist-card-heading');
    }
}