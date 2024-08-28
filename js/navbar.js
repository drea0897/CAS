document.addEventListener('DOMContentLoaded', () => {
    const menuIcon = document.querySelector('.menu-icon');
    const sidebar = document.querySelector('.sidebar');
    const mainContent = document.querySelector('.main-content');

    if (menuIcon && sidebar && mainContent) {
        // Initialize sidebar state based on sessionStorage
        const isCollapsed = sessionStorage.getItem('sidebarCollapsed') === 'true';
        if (isCollapsed) {
            sidebar.classList.add('collapsed');
            mainContent.classList.add('collapsed');
        }

        // Toggle sidebar on menu icon click
        menuIcon.addEventListener('click', () => {
            const isCollapsedNow = sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('collapsed', isCollapsedNow);
            sessionStorage.setItem('sidebarCollapsed', isCollapsedNow);
        });

        // Set active class on clicked menu item and store in session storage
        const menuItems = document.querySelectorAll('.menu li a');
        menuItems.forEach(item => {
            item.addEventListener('click', () => {
                // Remove 'active' class from all menu items
                menuItems.forEach(i => i.parentElement.classList.remove('active'));

                // Add 'active' class to the clicked menu item
                item.parentElement.classList.add('active');

                // Store the active page in session storage
                sessionStorage.setItem('activePage', item.getAttribute('data-page'));
            });
        });

        // Set active class based on session storage
        const activePage = sessionStorage.getItem('activePage');
        if (activePage) {
            menuItems.forEach(item => {
                if (item.getAttribute('data-page') === activePage) {
                    item.parentElement.classList.add('active');
                }
            });
        }
    }
});
