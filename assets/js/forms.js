
// Add Product page: Type Switcher logic
const type = document.getElementById('productType');
const forms = document.querySelectorAll('[data-form]');

// Selecting a type will show its form fields and hide the other forms and also set the required attribute in the input elements of the displayed form to true.
type.addEventListener('change', () => {

    const selectedForm = document.querySelector('[data-form=' + type.value + ']');

    forms.forEach((ele) => {
        const formInputs = ele.getElementsByTagName('input');
        if(ele === selectedForm) {
            selectedForm.style.display = 'block';
            for(let i = 0; i < formInputs.length; i++) {
                formInputs[i].required = true;
            }
        } else {
            ele.style.display = 'none';
            for(let i = 0; i < formInputs.length; i++) {
                formInputs[i].required = false;
            }
        }
    });
});