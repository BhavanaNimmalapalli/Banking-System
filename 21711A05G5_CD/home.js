document.addEventListener('DOMContentLoaded', function () {
    const featureItems = document.querySelectorAll('.feature-item');

    featureItems.forEach(item => {
        const featureImage = item.querySelector('.feature-image');
        const featureList = item.querySelector('.feature-list');
        const links = JSON.parse(item.getAttribute('data-links'));
        const imageSrc = item.getAttribute('data-image');

        featureImage.style.backgroundImage = `url(${imageSrc})`;

        item.addEventListener('mouseover', () => {
            featureImage.style.opacity = '1';
        });

        item.addEventListener('mouseout', () => {
            featureImage.style.opacity = '0';
        });

        item.addEventListener('click', () => {
            featureList.innerHTML = '';
            links.forEach(link => {
                const listItem = document.createElement('li');
                const anchor = document.createElement('a');
                anchor.href = link.url;
                anchor.textContent = link.text;
                listItem.appendChild(anchor);
                featureList.appendChild(listItem);
            });
            featureList.classList.remove('hidden');
        });
    });
});
