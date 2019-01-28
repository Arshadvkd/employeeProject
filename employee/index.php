
<?php include_once 'header.php' ?>
    <main>
        <?php
            if ($message) {
                echo "<div class=\"bg-success padding text-center\">Employee deleted successfully</div>";
            }else{
                echo "<div class=\"bg-error padding text-center\">{$message}</div>";
            }
        ?> 
        <div class="well row" id="employee-content" >
            <h3 class="text-center well-sm"><strong>Search Employee</strong></h3>
            <hr>
            <form id="employee-search" >
                <div class="col-lg-8 col-sm-6 form-group">
                    <input type="search" name="s" id="" class="form-control" placeholder="enter your keyword..">
                </div>
                <div class="col-lg-4 col-sm-6 form-group">
                    <input type="submit" value="Search" class="form-control btn-primary">
                </div>
            </form>
            <div class="clear"></div>

            <?php
            //to show search result for
            if(isset($_GET['s'])){
                echo "<h4>Search Result for : \"{$_GET['s']}\"</h4>";
            }
            ?>
            
            <hr>
            <div id="employee-table">
            <table class="table table-bordered white table-striped" >
                <thead>
                <tr class="info">
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                <?php
                
                if(isset($_GET['s'])){
                    //Search Result
                    //##

                    $search_query = $_GET['s'];
                    // changes characters used in html to their equivalents, for example: < to &gt;
                    $search_query = htmlspecialchars($search_query); 
                    // makes sure nobody uses SQL injection
                    $search_query = mysqli_real_escape_string($conn,$search_query);
                    $sql1 = "SELECT * FROM employee WHERE (empname LIKE '%{$search_query}%') OR (designation LIKE '%{$search_query}%') OR (phone LIKE '%{$search_query}%')";
                    $result = $conn->query($sql1);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $emp_id = $row["id"];
                            $employee_name = $row["empname"];
                            $designation = $row["designation"];
                            $address = $row["address"];
                            $phone = $row["phone"];
                            echo "<tr>
                                <td>{$employee_name}</td>
                                <td>{$designation}</td>
                                <td>{$address}</td>
                                <td>{$phone}</td>
                                <td><a href=\"?action=delete&id={$emp_id}\" class=\"btn btn-danger\">Delete</a></td>                            
                                </tr>";
                        }
                    } else {
                        echo "No Items Found";
                    }
            
                }else{
                    //Non Search Dispaly
                    $sql = "SELECT * FROM employee";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $emp_id = $row["id"];
                            $employee_name = $row["empname"];
                            $designation = $row["designation"];
                            $address = $row["address"];
                            $phone = $row["phone"];
                            echo "<tr>
                                <td>{$employee_name}</td>
                                <td>{$designation}</td>
                                <td>{$address}</td>
                                <td>{$phone}</td>
                                <td><a href=\"?action=delete&id={$emp_id}\" class=\"btn btn-danger\">Delete</a></td>                            
                                </tr>";
                        }
                    } else {
                        echo "No Items Found";
                    }
                    }

                    $conn->close();
                ?>
                
                
                
                </tbody>
            </table>
            </div>

        </div>
        <div class="well text-center">
            <a href="add-employee.php" class="btn btn-primary">Add Employee</a>
        </div>
    </main>
    
    <footer class=' text-center d-inline p-2 bg-primary text-white '>

        <h4>copyright&copy;Emptracking- All right reserved 2019</h4>
    
    </footer>
  </body>
</html>