document.getElementById('loginForm').addEventListener('submit', async function(event) {
    event.preventDefault();
    
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('error-message');

    try {
        const response = await fetch('login.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ username, password })
        });

        const result = await response.json();

        if (result.status === 'success') {
            if (result.role === 'หัวหน้างาน') {
                window.location.href = `./src/pages/user/index.php?id_user=${result.id_user}`;
            } else {
                window.location.href = `./src/pages/user/index.php?id_user=${result.id_user}`;
            }
        } else {
            errorMessage.textContent = result.message;
        }
    } catch (error) {
        errorMessage.textContent = 'An error occurred. Please try again.';
        console.error(error);
    }
});
