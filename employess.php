<?php
require_once'db.php';


// INSERT
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $conn->query("INSERT INTO employees (name, position, salary) 
                  VALUES ('$name','$position','$salary')");
} 

// DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM employees WHERE id=$id");
    
}


// DISPALY THE DATA FROM DATABASE
$edit = false;
if (isset($_GET['edit'])) {
    $edit = true;
    $id = $_GET['edit'];
    $res = $conn->query("SELECT * FROM employees WHERE id=$id");
    $row = $res->fetch_assoc();
}

// UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $conn->query("UPDATE employees SET 
        name='$name', position='$position', salary='$salary' 
        WHERE id=$id");
}
?>

<!DOCTYPE html>
<html><head>
    <style>
        body{
        background-color:orange;
        size: 25px;
        }
    </style>
</head>
<body>

<h2><?php echo $edit ? "Edit Employee" : "Add Employee"; ?></h2>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $edit ? $row['id'] : ''; ?>">
    
    NAME:<input type="text" name="name" placeholder="Name"
        value="<?php echo $edit ? $row['name'] : ''; ?>" required>

    POSITION:<input type="text" name="position" placeholder="Position"
        value="<?php echo $edit ? $row['position'] : ''; ?>" required>

    SALARY:<input type="number" name="salary" placeholder="Salary"
        value="<?php echo $edit ? $row['salary'] : ''; ?>" required>

    <button type="submit" name="<?php echo $edit ? 'update' : 'add'; ?>">
        <?php echo $edit ? "Update" : "Add"; ?>
    </button>
</form>

<hr>

<h2>Employees of ce_tech</h2>

<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Position</th>
    <th>Salary</th>
    <th>Action</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM employees");

while ($r = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$r['id']}</td>
        <td>{$r['name']}</td>
        <td>{$r['position']}</td>
        <td>{$r['salary']}</td>
        <td>
            <a href='?edit={$r['id']}'>Edit</a> |
            <a href='?delete={$r['id']}'>Delete</a>
        </td>
    </tr>";
}
?>

</table>

</body>
</html>