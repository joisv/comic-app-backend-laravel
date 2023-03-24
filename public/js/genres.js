const relatives = document.querySelectorAll('.gens');
  relatives.forEach(function(relative, index) {
      const input = relative.querySelector('input');
      const label = relative.querySelector('label');
      input.setAttribute('id', 'genre' + (index + 1));
      label.setAttribute('for', 'genre' + (index + 1));
  });
const inputs = document.querySelectorAll('input[type="checkbox"]');
const targetInput = document.querySelector('input#genres');
inputs.forEach(function(input) {
    if(input.checked){
        const labelId = input.getAttribute('id');
        const label = document.querySelector(`label[for="${labelId}"]`);
        label.classList.toggle('bg-primary', true);
        label.classList.toggle('text-slate-100', true);
        targetInput.value += label.innerHTML + ", ";
    }
    input.addEventListener('change', function() {
        const labelId = this.getAttribute('id');
        const label = document.querySelector(`label[for="${labelId}"]`);
        label.classList.toggle('bg-primary', this.checked);
        label.classList.toggle('text-slate-100', this.checked);
        if (this.checked) {
            targetInput.value += label.innerHTML + ", ";
            targetInput.focus();
        } else {
            targetInput.value = targetInput.value.replace(label.innerHTML + ", ", "");
        }
    });
});

const genresBtn = document.querySelectorAll('.genres-btn')
const genresForm = document.querySelector('.genres-form')
genresBtn.forEach(function(e){
  e.addEventListener('click', function(event){
    event.preventDefault()
    genresForm.classList.toggle('hidden')
    // genresForm.classList.toggle('-right-3')
  })
});
  


