document.addEventListener('DOMContentLoaded', function() {
    fetch('http://localhost:8000/get_patients.php') 
        .then(response => response.json())
        .then(data => {
            if (Array.isArray(data)) {
                const patientsList = document.getElementById('patients-list');
                patientsList.innerHTML = ''; 

                data.forEach(patient => {
                    const patientDiv = document.createElement('div');
                    patientDiv.innerHTML = `
                        <p>ID: ${patient.id}</p>
                        <p>Name: ${patient.name}</p>
                        <p>Code: ${patient.code}</p>
                        <p>Severity: ${patient.severity}</p>
                        <p>Status: ${patient.status}</p>
                        <p>Queue Time: ${new Date(patient.queue_time).toLocaleString()}</p>
                        <button onclick="updateStatus(${patient.id}, 'treated')">Mark as Treated</button>
                        <hr>
                    `;
                    patientsList.appendChild(patientDiv);
                });
            } else {
                console.error('Unexpected response format:', data);
            }
        })
        .catch(error => console.error('Error fetching patients:', error));
});

function updateStatus(id, status) {
    fetch('http://localhost:8000/update_patients.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id=${id}&status=${status}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            alert(data.message);
            location.reload();
        } else {
            alert('Error updating patient status.');
        }
    });
}
