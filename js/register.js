document.addEventListener('DOMContentLoaded', function() {
    fetchUsers();

    const modal = document.getElementById('userModal');
    const userDetails = document.getElementById('userDetails');
    const approveButton = document.getElementById('approveButton');
    const declineButton = document.getElementById('declineButton');
    const closeButton = document.querySelector('.close');
    const backButton = document.getElementById('backButton');
    let currentUserId;

    function fetchUsers() {
        fetch('backend/get_user_register.php')
            .then(response => response.json())
            .then(data => populateUserTable(data));
    }

    function populateUserTable(users) {
        const userTable = document.querySelector('#userTable tbody');
        userTable.innerHTML = '';

        users.forEach(user => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${user.user_id}</td>
                <td>${user.email}</td>
                <td>${user.last_name}</td>
                <td>${user.first_name}</td>
                <td><button class="viewDetails" data-user-id="${user.user_id}">View Details</button></td>
            `;
            userTable.appendChild(row);
        });

        document.querySelectorAll('.viewDetails').forEach(button => {
            button.addEventListener('click', function() {
                currentUserId = this.getAttribute('data-user-id');
                fetchUserDetails(currentUserId);
            });
        });
    }

    function fetchUserDetails(userId) {
        fetch(`backend/get_user_details_register.php?user_id=${userId}`)
            .then(response => response.json())
            .then(data => {
                userDetails.innerHTML = `
                    <p><strong>User ID:</strong> ${data.user_id}</p>
                    <p><strong>Email:</strong> ${data.email}</p>
                    <p><strong>Last Name:</strong> ${data.last_name}</p>
                    <p><strong>First Name:</strong> ${data.first_name}</p>
                    <p><strong>Middle Name:</strong> ${data.middle_name}</p>
                    <p><strong>Gender:</strong> ${data.gender}</p>
                    <p><strong>Contact Number:</strong> ${data.contact_number}</p>
                    <p><strong>Civil Status:</strong> ${data.civil_status}</p>
                    <p><strong>Region:</strong> ${data.region}</p>
                    <p><strong>Province:</strong> ${data.province}</p>
                    <p><strong>Municipality:</strong> ${data.municipality}</p>
                    <p><strong>Barangay:</strong> ${data.barangay}</p>
                    <p><strong>Religion:</strong> ${data.religion}</p>
                    <p><strong>Status:</strong> ${data.status}</p>
                    <p><strong>Date Created:</strong> ${data.date_created}</p>
                `;
                modal.style.display = 'block';
            });
    }

    approveButton.addEventListener('click', function() {
        handleAction('approve');
    });

    declineButton.addEventListener('click', function() {
        handleAction('decline');
    });

    backButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    closeButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });

    function handleAction(action) {
        fetch('backend/handle_action_register.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `user_id=${currentUserId}&action=${action}`
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            modal.style.display = 'none';
            fetchUsers();
        });
    }
});
