// Load all icons: PNG and WEBP
const icons = import.meta.glob([
    '../icons/*.png',
    '../icons/*.jpg',
    '../icons/*.webp'
], { eager: true, import: 'default' });

// Load all images: JPG and WEBP
const images = import.meta.glob([
    '../images/*.jpg',
    '../images/*.webp',
    '../images/*.jpeg'
], { eager: true, import: 'default' });

document.addEventListener('DOMContentLoaded', () => {
    // For icons
    document.querySelectorAll('[data-icon]').forEach(el => {
        const name = el.getAttribute('data-icon');
        for (const path in icons) {
            if (path.includes(name)) {
                el.src = icons[path];
                break;
            }
        }
    });

    // For images
    document.querySelectorAll('[data-image]').forEach(el => {
        const name = el.getAttribute('data-image');
        for (const path in images) {
            if (path.includes(name)) {
                el.src = images[path];
                break;
            }
        }
    });
});
