document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.create-account-form'); 
    const accountHolderInput = form.querySelector('#account-holder');
    const accountNumberInput = form.querySelector('#account-number');
    const mobileNumberInput = form.querySelector('#mobile-number');
    const bankNameInput = form.querySelector('#bank-name');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); 

        removeErrorMessages(form);

        let isValid = true;

        if (accountHolderInput.value.trim() === '') {
            showError(accountHolderInput, 'Account holder name is required.');
            isValid = false;
        }

        if (accountNumberInput.value.trim() === '') {
            showError(accountNumberInput, 'Account number is required.');
            isValid = false;
        }

        if (mobileNumberInput.value.trim() === '') {
            showError(mobileNumberInput, 'Mobile number is required.');
            isValid = false;
        }

        if (bankNameInput.value.trim() === '') {
            showError(bankNameInput, 'Bank name is required.');
            isValid = false;
        }

        if (isValid) {
            const accountDetails = `
                <p><strong></br>Account Holder Name:</strong> ${accountHolderInput.value.trim()}</p></br>
                <p><strong></br>Account Number:</strong> ${accountNumberInput.value.trim()}</p></br>
                <p><strong></br>Mobile Number:</strong> ${mobileNumberInput.value.trim()}</p></br>
                <p><strong></br>Bank Name:</strong> ${bankNameInput.value.trim()}</p></br>
            `;

            const outputContainer = document.querySelector('.account-info'); 
            outputContainer.innerHTML = accountDetails; 
        }
    });

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
