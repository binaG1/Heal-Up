<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Statistika</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .back{
            text-decoration: none;
            font-size: 30px;
            color: #007BFF;
        }
    </style>
</head>
<body>
    <a href="manage_users.php" class="back">↩</a>
  <h2 style="text-align:center;">Statistika e Përdoruesve</h2>
  <canvas id="userChart" ></canvas>

  <script >
    const ctx = document.getElementById('userChart').getContext('2d');
    const userChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            datasets: [{
                label: 'Përdorues të rinj',
                data: [12, 19, 15, 8, 22], 
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
  </script>
</body>
</html>
