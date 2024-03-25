<div class="app-main__outer">
        <div class="app-main__inner">
             


            <?php 
                @$exam_id = $_GET['exam_id'];


                if($exam_id != "")
                {
                   $selEx = $conn->query("SELECT * FROM examen WHERE num_exam='$exam_id' ")->fetch(PDO::FETCH_ASSOC);
                   $exam_course = $selEx['cou_id'];

                   

                   $selExmne = $conn->query("SELECT * FROM etudiant et  WHERE exmne_course='$exam_course'  ");


                   ?>
                   <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div><b class="text-primary">RANKING BY EXAM</b><br>
                                Exam Name : <?php echo $selEx['ex_title']; ?><br><br>
                               <span class="border" style="padding:10px;color:white;background-color: #3ac47d;">Excellence</span>
                               <span class="border" style="padding:10px;color:black;background-color: #E2FCEF;">Very Good</span>
                               <span class="border" style="padding:10px;color:white;background-color: #ced4da;">Good</span>
                               <span class="border" style="padding:10px;color:white;background-color: #d92550;">Failed</span>
                               <span class="border" style="padding:10px;color:black;background-color: #E9ECEE;">Not Answering</span>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                          <tbody>
                            <thead>
                                <tr>
                                    <th width="25%">Fullname</th>
                                    <th>Note / Over</th>
                                    <th>Pourcentage</th>
                                </tr>
                            </thead>
                            <?php 
                                while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <?php 
                                            $exmneId = $selExmneRow['num_etudiant'];
                                            $selScore = $conn->query("SELECT * FROM qcm eqt INNER JOIN exam_answers ea ON eqt.num_quest = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ORDER BY ea.exans_id DESC");

                                              $selAttempt = $conn->query("SELECT * FROM exam_attempt WHERE num_etudiant='$exmneId' AND exam_id='$exam_id' ");

                                             $over = $selEx['ex_questlimit_display']  ;    


                                              @$score = $selScore->rowCount();
                                                @$ans = $score / $over * 100;

                                         ?>
                                       <tr style="<?php 
                                             if($selAttempt->rowCount() == 0)
                                             {
                                                echo "background-color: #E9ECEE;color:black";
                                             }
                                             else if($ans >= 90)
                                             {
                                                echo "background-color: #3ac47d;";
                                             } 
                                             else if($ans >= 80){
                                                echo "background-color: #E2FCEF;color:black";
                                             }
                                             
                                             else if($ans >= 75){
                                                echo "background-color:  #ced4da;color:white";
                                             }
                                             else
                                             {
                                                echo "background-color: #d92550 ;color:white";
                                             }
                                           
                                            
                                             ?>"
                                        >
                                        <td>

                                          <?php echo $selExmneRow['exmne_fullname']; ?></td>
                                        
                                        <td >
                                        <?php 
                                          if($selAttempt->rowCount() == 0)
                                          {
                                            echo "Not answer yet";
                                          }
                                          else if($selScore->rowCount() > 0)
                                          {
                                            echo $totScore =  $selScore->rowCount();
                                            echo " / ";
                                            echo $over;
                                          }
                                          else
                                          {
                                            echo $totScore =  $selScore->rowCount();
                                            echo " / ";
                                            echo $over;
                                          }

                                            
                                            

                                         ?>
                                        </td>
                                        <td>
                                          <?php 
                                                if($selAttempt->rowCount() == 0)
                                                {
                                                  echo "Not answer yet";
                                                }
                                                else
                                                {
                                                    echo number_format($ans,2); ?>%<?php
                                                }
                                           
                                          ?>
                                        </td>
                                    </tr>
                                <?php }
                             ?>                              
                          </tbody>
                        </table>
                    </div>



                   <?php
                }
                else
                { ?>
                <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div><b>RANKING BY EXAM</b></div>
                    </div>
                </div>
                </div> 

                 <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">EXAM List
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4">Exam Title</th>
                                <th class="text-left ">Course</th>
                                <th class="text-left ">Description</th>
                                <th class="text-center" width="8%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selExam = $conn->query("SELECT * FROM examen ORDER BY num_exam DESC ");
                                if($selExam->rowCount() > 0)
                                {
                                    while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td class="pl-4"><?php echo $selExamRow['ex_title']; ?></td>
                                            <td>
                                                <?php 
                                                    $courseId =  $selExamRow['cou_id']; 
                                                    $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$courseId' ");
                                                    while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) {
                                                        echo $selCourseRow['cou_name'];
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $selExamRow['ex_description']; ?></td>
                                            <td class="text-center">
                                             <a href="?page=ranking-exam&exam_id=<?php echo $selExamRow['num_exam']; ?>"  class="btn btn-success btn-sm">View</a>
                                            </td>
                                        </tr>

                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="5">
                                        <h3 class="p-3">No Exam Found</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>   
                    
                <?php }

             ?>      
            
            
      
        
</div>
         


















