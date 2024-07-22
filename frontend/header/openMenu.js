const dropdown_button = document.querySelector('.dropdown-button');
const dropdown_content = document.querySelector('.dropdown-content');
dropdown_button.addEventListener('click', (event) => {
  dropdown_content.classList.toggle('isOpen');
  event.stopPropagation();
})
document.addEventListener('click', (event) => {
  if (dropdown_content.classList.contains('isOpen') && !dropdown_content.contains(event.target) && !dropdown_button.contains(event.target)) {
    dropdown_content.classList.remove('isOpen');
  }
});