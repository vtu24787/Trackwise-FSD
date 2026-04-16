
<html>
<head>
    <?php
include 'db.php';

if(isset($_POST['submit'])) {

    $amount = $_POST['amount'];
    $category = $_POST['category'];

    $date = date("Y-m-d"); // current date

    $sql = "INSERT INTO expenses (amount, category, date)
            VALUES ('$amount', '$category', '$date')";

    mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>TrackWise</title>

    <!-- CSS -->
    <style>
    .btn {
    padding: 6px 10px;
    margin: 2px;
    border-radius: 6px;
    text-decoration: none;
    color: white;
    font-size: 13px;
}

.edit {
    background: #6328a7;
}

.delete {
    background: #dc3545;
}

.btn:hover {
    opacity: 0.8;
}
        .form-box input:focus {
    box-shadow: 0 0 10px #0800ff;
}
        body {
            margin: 0;
            font-family: Arial;
        }

        .plate {
            width: 100%;
            height: 150px;
            border-radius: 20px;
            margin: 20px 0;
            transform: skewY(-3deg);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .plate1 { background: #b54cf6; }
        .plate2 { background: #6E6B2F; }

        .plate h2 {
            transform: skewY(3deg);
            padding: 40px;
        }
        .form-box {
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    padding: 20px;
    border-radius: 15px;
    width: 60%;
    margin: 20px auto;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    color: white;
}

.form-box h2 {
    margin-bottom: 15px;
}

/* Input Styling */
.form-box input {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border-radius: 8px;
    border: none;
    outline: none;
    font-size: 14px;
}

/* Button Styling */
.form-box button {
    width: 100%;
    padding: 12px;
    background: #00ff1e;
    border: none;
    border-radius: 8px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

.form-box button:hover {
    background: #00ffcc;
}
    </style>
</head>

<body>

</body>
</html>
    <?php
session_start();
include 'db.php';

$user = $_SESSION['user'];

// get user id
$res = $conn->query("SELECT id FROM users WHERE username='$user'");
$row = $res->fetch_assoc();
$user_id = $row['id'];

// get total expense
$total_query = $conn->query("SELECT SUM(amount) AS total FROM expenses WHERE user_id='$user_id'");
$data = $total_query->fetch_assoc();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .plate h2 {
    transform: skewY(3deg);
    padding: 40px;
    color: #000;
}
.plate {
    border: 3px solid black;
    box-shadow: 5px 5px 0px black;
}
   
  
    .chart-box {
    width: 350px;   /* control size */
    margin: 20px auto;
}

#myChart {
    height: 220px !important;
}

    .container {
    width: 80%;
    margin: auto;
    margin-top: 30px;
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}
.cards {
    display: flex;
    gap: 20px;
    margin: 20px 0;
}
.card {
    flex: 1;
    background: linear-gradient(135deg, #007bff, #00c6ff);
    color: white;
    padding: 25px;
    border-radius: 12px;
    text-align: center;
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
}
body {
    font-family: 'Segoe UI', sans-serif;
    background: #f4f6f9;
    margin: 0;
}
h3 {
    margin-top: 30px;
}
    .logout-btn {
    background: white;
    color: red;
    padding: 8px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
}

.logout-btn:hover {
    background: darkred;
}
    /* HEADER */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #007bff;
    color: white;
    padding: 15px 30px;
}

.header {
    background: linear-gradient(90deg, #007bff, #0056b3);
    color: white;
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 0 0 10px 10px;
}

/* IMPROVE CONTAINER */
.container {
    width: 70%;
    margin: 30px auto;
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

/* CARDS UPGRADE */
.card {
    flex: 1;
    background: linear-gradient(135deg, #007bff, #00c6ff);
    color: white;
    padding: 25px;
    border-radius: 12px;
    text-align: center;
    transition: 0.3s;
}
.chart-box {
    width: 320px;
    height: 320px;
    margin: 20px auto;
    padding: 15px;
    border-radius: 15px;
    background: rgb(159, 144, 144);
    backdrop-filter: blur(10px);

}
#myChart {
    height: 220px !important;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgb(47, 32, 216);
}


.card:hover {
    transform: translateY(-5px);
}

/* FORM STYLE */
form {
    margin-top: 20px;
}

input {
    padding: 8px;
    width: 60%;
    border-radius: 5px;
    border: 1px solid #ccc;
}

button {
    background: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    margin-top: 10px;
    cursor: pointer;
}

button:hover {
    background: #0056b3;
}

/* TABLE IMPROVE */
table {
    margin-top: 20px;
    border-radius: 10px;
    overflow: hidden;
}

th {
    background: #007bff;
    color: white;
}
body {
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #0f172a, #1e3a8a, #7c3aed);
    color: white;

}
.btn-delete {
    background-color: #af4dff;
    color: white;
    padding: 6px 12px;
    border-radius: 6px;
    text-decoration: none;
    margin-left: 5px;
}

.btn-delete:hover {
    background-color: #cc0000;
}

.container {
    width: 80%;
    margin: 40px auto;
    padding: 30px;
    border-radius: 15px;
    background: rgba(116, 170, 9, 0.08);
    backdrop-filter: blur(15px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.3);

}
button {
    background: #d63d3d;
    color: white;
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
}
table {
    width: 100%;
    border-collapse: collapse;
}
th {
    background: #007bff;
    color: white;
}
th, td {
    padding: 10px;
}
.cards {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
}

.card {
    flex: 1;
    padding: 20px;
    border-radius: 15px;
    background: linear-gradient(135deg, #00ff40, #00ffbb);
    box-shadow: 0 5px 20px rgba(0,0,0,0.3);
    transition: 0.3s;
}

.card:hover {
    transform: scale(1.05);

}

.card h4 {
    margin: 0;
    font-size: 18px;
}

.card p {
    font-size: 22px;
    font-weight: bold;
}
table {
    margin-top: 20px;
    border-radius: 10px;
    overflow: hidden;

    width: 100%;              /* ADD THIS */
    border-collapse: collapse; /* ADD THIS */
    text-align: center;        /* ADD THIS */
}

th, td {
    padding: 12px;            /* ADD THIS */
    border: 1px solid rgba(255,255,255,0.2); /* ADD THIS */
}
td:last-child {
    display: flex;
    justify-content: center;
    gap: 10px;
}
</style>
<body>
<div class="header">
    <h2>TrackWise Dashboard</h2>
    
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

<div class="container">

<h2>Welcome <?php echo $_SESSION['user']; ?></h2>
<div class="chart-box">
    <h3 style="text-align:center;">Expense Chart</h3>
    <canvas id="myChart"></canvas>
</div>
    <?php
    $chart = $conn->query("SELECT category, SUM(amount) as total FROM expenses GROUP BY category");

    $categories = [];
    $amounts = [];

    while($row = $chart->fetch_assoc()){
        $categories[] = $row['category'];
        $amounts[] = $row['total'];
    }
    ?>

    <canvas id="myChart"></canvas>
</div>
<div class="cards">
    <div class="card">
        <h4>Total Expense</h4>
        <p>₹ <?php echo $data['total']; ?></p>
    </div>

    <div class="card">
        <h4>Total Entries</h4>
        <p>
        <?php
        $count = $conn->query("SELECT COUNT(*) as c FROM expenses WHERE user_id='$user_id'");
        $c = $count->fetch_assoc();
        echo $c['c'];
        ?>
        </p>
    </div>
</div>
<div class="form-box">
    <h2>Add Expense</h2>

    <form method="POST">

        <input type="number" name="amount" placeholder="💰 Enter Amount" required>

        <input type="text" name="category" placeholder="📂 Enter Category" required>

        <input type="date" name="date" required>

        <button type="submit" name="submit">➕ Add Expense</button>
    </form>
</div>
<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'pie',
    data: {
        labels: <?php echo json_encode($categories); ?>,
        datasets: [{
            data: <?php echo json_encode($amounts); ?>,
            backgroundColor: ['#73ff00','#ff4d4d','#28a745','#ffc107']
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        animation: {
            animateRotate: true,
            animateScale: true,
            duration: 1200
        },
        plugins: {
            legend: {
                position: 'top'
            }
        }
    }
});
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $amount = $_POST['amount'] ?? null;
    $category = $_POST['category'] ?? null;
    $date = $_POST['date'] ?? null;

    if ($amount && $category && $date) {
        // your insert query
    }
}

    $user = $_SESSION['user'];

    // get user id
    $res = $conn->query("SELECT id FROM users WHERE username='$user'");
    $row = $res->fetch_assoc();
    $user_id = $row['id'];

    // insert expense
    $sql = "INSERT INTO expenses (user_id, amount, category, date) 
            VALUES ('$user_id', '$amount', '$category', '$date')";

    if($conn->query($sql)){
        echo "Expense added!";
    }
}
?>
<h3>Total Expense</h3>

<?php
$user = $_SESSION['user'];
$res = $conn->query("SELECT id FROM users WHERE username='$user'");
$row = $res->fetch_assoc();
$user_id = $row['id'];

$total = $conn->query("SELECT SUM(amount) AS total FROM expenses WHERE user_id='$user_id'");
$data = $total->fetch_assoc();

echo "<h2>Total: ₹ ".$data['total']."</h2>";
?>

<h3>Your Expenses</h3>
<?php
$sql = "SELECT * FROM expenses";
$result = mysqli_query($conn, $sql);
?>

<table border="1">
    <tr>
    <th>ID</th>
    <th>Amount</th>
    <th>Category</th>
    <th>Date</th>
    <th>Action</th>
</tr>
<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['amount']; ?></td>
    <td><?php echo $row['category']; ?></td>
    <td><?php echo $row['date']; ?></td>
    <td>
    
    

    <!-- ✅ Delete Button -->
    <a href="delete.php?id=<?php echo $row['id']; ?>" 
       onclick="return confirm('Are you sure you want to delete?');"
       class="btn-delete">
       Delete
    </a>
</td>
</tr>
    
</tr>
<?php } ?>
<?php
$user = $_SESSION['user'];
$res = $conn->query("SELECT id FROM users WHERE username='$user'");
$row = $res->fetch_assoc();
$user_id = $row['id'];
$conn->query("SELECT * FROM expenses WHERE user_id='$user_id' ORDER BY id DESC");

while($data = $result->fetch_assoc()){
    echo "<tr>
        <td>".$data['id']."</td>
        <td>".$data['amount']."</td>
        <td>".$data['category']."</td>
        <td>".$data['date']."</td>
        <td>
    <a href='edit.php?id=".$data['id']."'>Edit</a> |
    <a href='delete.php?id=".$data['id']."'>Delete</a>
</td>
    </tr>";
}

?>
</table>

<canvas id="myChart" height="120"></canvas>
<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: <?php echo json_encode($categories); ?>,
        datasets: [{
            data: <?php echo json_encode($amounts); ?>,
            backgroundColor: [
                '#00e5ff',
                '#ff4d6d',
                '#ffd60a',
                '#38b000'
            ],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        cutout: '60%',
        animation: {
            animateRotate: true,
            animateScale: true,
            duration: 1500,
            easing: 'easeOutBounce'
        },
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    color: 'white',
                    font: { size: 14 }
                }
            }
        }
    }
});
</script>
</script>
</div>
<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'pie',
    data: {
        labels: <?php echo json_encode($categories); ?>,
        datasets: [{
            data: <?php echo json_encode($amounts); ?>,
            backgroundColor: ['#007bff','#ff4d4d','#28a745','#ffc107']
        }]
    },
    options: {
        responsive: true,
        animation: {
            animateRotate: true,
            animateScale: true
        }
    }
});

</script>
</body>



</div>
</html>