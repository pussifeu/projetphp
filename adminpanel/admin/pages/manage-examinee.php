<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE STUDENT</div>
                    </div>
                </div>
            </div>
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <div class="text-end mb-4">
                <input type="text" id="search" class="form-control shadow-none w-25 ms-auto" placeholder="type to search...">
            </div>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#search").keyup(function(){
                        var search = $(this).val();
                        $.ajax({
                            url:'search.php',
                            method:'post',
                            data:{query:search},
                            success:function(response){
                                $("#tablelist").html(response);
                            }
                        });
                    });
                });
            </script>
        </div>
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Student List
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th>Number</th>   
                                <th>Fullname</th>
                                <th>Gender</th>
                                <th>Birthdate</th>
                                <th>Courses</th>
                                <th>Level</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                                $selExmne = $conn->query("SELECT * FROM etudiant ORDER BY num_etudiant DESC ");
                                if($selExmne->rowCount() > 0)
                                {
                                    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                           <td><?php echo $selExmneRow['num_etudiant']; ?></td>
                                           <td><?php echo $selExmneRow['exmne_fullname']; ?></td>
                                           <td><?php echo $selExmneRow['exmne_gender']; ?></td>
                                           <td><?php echo $selExmneRow['exmne_birthdate']; ?></td>
                                           <td>
                                            <?php
                                                 $exmneCourse = $selExmneRow['exmne_course'];
                                                 $examenCourseArray = explode( ',', $exmneCourse );
                                                 foreach($examenCourseArray as $value) {
                                                    $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$value' ")->fetch(PDO::FETCH_ASSOC);
                                                    echo $selCourse['cou_name']. "<br>";
                                                 }
                                             ?>
                                            </td>
                                           <td><?php echo $selExmneRow['niveau']; ?></td>
                                           <td><?php echo $selExmneRow['adr_email']; ?></td>
                                           <td><?php echo $selExmneRow['exmne_password']; ?></td>
                                           <td><?php echo $selExmneRow['exmne_status']; ?></td>
                                           <td>
                                               <a rel="facebox" href="facebox_modal/updateExaminee.php?id=<?php echo $selExmneRow['num_etudiant']; ?>" class="btn btn-sm btn-primary">Update</a>
                                               <button type="button" id="deleteStud" data-id='<?php echo $selExmneRow['num_etudiant']; ?>'  class="btn btn-danger btn-sm">Delete</button>
                                           </td>
                                        </tr>
                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="10">
                                        <h3 class="p-3">No Student Found</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>

         
