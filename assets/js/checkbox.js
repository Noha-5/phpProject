
// Product List page: checkbox toggle style classes on check
const checkbox = document.querySelectorAll(".delete-checkbox");
const items = document.querySelectorAll(".outset-shadow");

for(let i=0; i< checkbox.length; i++) {
    checkbox[i].addEventListener('change', function() {
        if(this.checked) {
            items[i].classList.add('inset-shadow');
            items[i].classList.remove('outset-shadow');
        } else {
            items[i].classList.add('outset-shadow');
            items[i].classList.remove('inset-shadow');
        }
    });
}