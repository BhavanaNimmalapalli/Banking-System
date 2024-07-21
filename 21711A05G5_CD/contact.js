document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.contact-form');
    const nameInput = form.querySelector('#name');
    const emailInput = form.querySelector('#email');
    const messageInput = form.querySelector('#message');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); 

        // Clear previous error messages
        removeErrorMessages(form);

        let isValid = true;

        if (nameInput.value.trim() === '') {
            showError(nameInput, 'Name is required.');
            isValid = false;
        }

        if (!isValidEmail(emailInput.value.trim())) {
            showError(emailInput, 'Invalid email format.');
            isValid = false;
        }

        if (messageInput.value.trim() === '') {
            showError(messageInput, 'Message is required.');
            isValid = false;
        }

        if (isValid) {
            form.submit(); 
        }
    });

    function isValidEmail(email) {
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return emailPattern.test(email);
    }

    function showError(input, message) {
        const errorSpan = document.createElement('span');
        errorSpan.className = 'error-message';
        errorSpan.textContent = message;
        input.insertAdjacentElement('afterend', errorSpan);
    }

    function removeErrorMessages(form) {
        const errorMessages = form.querySelectorAll('.error-message');
        errorMessages.forEach((msg) => msg.remove());
    }
});
