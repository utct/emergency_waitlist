document.getElementById('signin-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const code = document.getElementById('code').value;

    console.log(`Name: ${name}, Code: ${code}`); 

    fetch('http://localhost:8000/add_patient.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `name=${name}&code=${code}&severity=1`
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            document.getElementById('wait-time').textContent = 'Patient added successfully!';
        } else {
            document.getElementById('wait-time').textContent = 'Error adding patient.';
        }
    });
});
