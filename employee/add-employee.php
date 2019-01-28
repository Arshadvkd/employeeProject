<?php include_once 'db.php'; ?>
<?php include_once 'header.php'; ?>

<?php 
    $message = "";
    if (isset($_POST['submit'])) {
        $employee_name = $_POST['employee-name'];
        $designation = $_POST['designation'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        # code...
        $sql = "INSERT INTO employee (empname, designation, address, phone)
        VALUES ('{$employee_name}', '{$designation}', '{$address}' , '{$phone}')";
        
        if ($conn->query($sql) === TRUE) {
            $message = true;
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    
    $conn->close();

?>



    <main>
        <?php
            if ($message) {
                echo "<div class=\"bg-success padding text-center\">New employee created successfully</div>";
            }else{
                echo "<div class=\"bg-error padding text-center\">{$message}</div>";
            }
        ?>    

        <div class="well row" id="employee-content" >
            <h3 class="text-center well-sm"><b>Add New Employee</b></h3>
            <hr>
            <div class="clear"></div>
            <form name="add-employee" method="post" action="">
            <div class="form-group">
                <label for="employee-name">Name:</label>
                <input type="text" class="form-control" id="employee-name" name="employee-name" required>
            </div>
            <div class="form-group">
                <label for="designation">Designation:</label>
                <input type="text" class="form-control" id="designation" name="designation" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" class="form-control" id="phone" name="phone" required pattern="[1-9][0-9]{9}">
            </div>
            
            <button type="submit" class="btn btn-primary block" name="submit" value="submit">Add</button>
            </form>
            
            

        </div>
        <div class="well text-center">
            <a href="index.php" class="btn btn-primary">View Employees</a>
        </div>
    </main>
    
    <footer class=' text-center d-inline p-2 bg-primary text-white '>

<h4>copyright&copy;EMPTracking- All right reserved 2019</h4>

</footer>
</body>
</html>