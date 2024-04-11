<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead Statuses</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div style="display:flex; justify-content: space-between;">
    <button onclick="window.location.href='index.php'">Add lead</button>
    <button style="color: #838080; opacity: 0.5" onclick="window.location.href='proxy.php'">API request</button>
</div>
<h1>Lead Statuses</h1><p>(скріншот як доказ що на локалці все працює також є кнопка request справа)))</p>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Status</th>
        <th>FTD</th>
    </tr>
    </thead>
    <tbody id="leadTableBody">

    </tbody>
</table>
<img style="position: absolute; right: 0; top: 10%" src="Снимок%20экрана%202024-04-10%20в%2018.16.07.png">
<script>
    $.ajax({
        type: 'POST',
        url: 'proxy.php',
        data: JSON.stringify({
            "page": 0,
            "limit": 100
        }),
        contentType: 'application/json',
        success: function (response) {

            if (response.status && Array.isArray(response.data) && response.data.length > 0) {
                // Очищаем таблицу перед добавлением
                $('#leadTableBody').empty();

                response.data.forEach(function (lead) {
                    var leadRow = `
                    <tr>
                        <td>${lead.id}</td>
                        <td>${lead.email}</td>
                        <td>${lead.status}</td>
                        <td>${lead.ftd}</td>
                    </tr>
                `;
                    $('#leadTableBody').append(leadRow);
                });
            } else {
                console.log('No leads found.');
            }
        },
    });
</script>
</body>
</html>
