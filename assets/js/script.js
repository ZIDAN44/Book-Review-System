//Disable submit button untill 'required' done
document.addEventListener('DOMContentLoaded', function () {
    const starRating = document.getElementById('starRating');
    const reviewText = document.getElementById('reviewText');
    const submitButton = document.getElementById('submitButton');

    starRating.addEventListener('change', checkValidity);
    reviewText.addEventListener('input', checkValidity);

    function checkValidity() {
        if (starRating.querySelector('input:checked') && reviewText.value.trim() !== '') {
            submitButton.removeAttribute('disabled');
            submitButton.style.backgroundColor = '#007bff';
        } else {
            submitButton.setAttribute('disabled', 'disabled');
            submitButton.style.backgroundColor = '#ccc';
        }
    }
});
