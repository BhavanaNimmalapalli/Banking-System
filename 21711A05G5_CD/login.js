document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.form');
    const emailInput = form.querySelector('input[type="email"]');
    const passwordInput = form.querySelector('input[type="password"]');

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        removeErrorMessages(form);

        let isValid = true;

        if (!isValidEmail(emailInput.value.trim())) {
            showError(emailInput, 'Invalid email format.');
            isValid = false;
        }

        if (passwordInput.value.trim() === '') {
            showError(passwordInput, 'Password is required.');
            isValid = false;
        }

        if (isValid) {
            redirectAfterLogin(); // Redirect if validation passes
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

    function redirectAfterLogin() {
        window.location.href = 'home.html'; // Redirect to home page
    }
});
