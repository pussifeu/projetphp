<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">

         
                <li class="app-sidebar__heading">Examen disponible</li>
                <li>
                <a href="#">
                     <i class="metismenu-icon pe-7s-display2"></i>
                     Examen
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul >
                    <?php
                        $exmneId = $_SESSION['examineeSession']['num_etudiant'];
                        $selTakenExam = $conn->query("SELECT examen.* FROM examen INNER JOIN exam_attempt ON examen.num_exam = exam_attempt.exam_id WHERE exam_attempt.num_etudiant = '$exmneId' ORDER BY num_exam ASC");
                        if($selExam->rowCount() > 0)
                                {
                                    while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) {
                                        $selTakenExamRow = $selTakenExam->fetch(PDO::FETCH_ASSOC);
                                        ?>
                                         <li>
                                         <a href="#" id="startQuiz" data-id="<?php echo $selExamRow['num_exam']; ?>"  >
                                            <?php
                                                $lenthOfTxt = strlen($selExamRow['ex_title']);
                                                if($lenthOfTxt >= 23)
                                                { ?>
                                                    <?php echo substr($selExamRow['ex_title'], 0, 20);?>.....
                                                <?php }
                                                else {
                                                    echo $selExamRow['ex_title'];
                                                }
                                             ?>
                                         </a>
                                         </li>
                                    <?php }
                                }
                                else
                                { ?>
                                    <a href="#">
                                        <i class="metismenu-icon"></i>Pas d'examen disponible pour le moment
                                    </a>
                                <?php }
                         ?>


                </ul>
                </li>

                 <li class="app-sidebar__heading">Examen passé</li>
                 <li>
                  <?php
                    $exmneId = $_SESSION['examineeSession']['num_etudiant'];
                    $selTakenExam = $conn->query("SELECT examen.* FROM examen INNER JOIN exam_attempt ON examen.num_exam = exam_attempt.exam_id WHERE exam_attempt.num_etudiant = '$exmneId' ORDER BY num_exam ASC");
                    if($selTakenExam->rowCount() > 0)
                    {
                        while ($selTakenExamRow = $selTakenExam->fetch(PDO::FETCH_ASSOC)) {
?>
                            <a href="home.php?page=result&id=<?php echo $selTakenExamRow['num_exam']; ?>" >
                               
                                <?php echo $selTakenExamRow['ex_title']; ?>
                            </a>
                        <?php }
                    }
                    else
                    { ?>
                        <a href="#" class="pl-3">Vous n'avez pas passé un examen</a>
                    <?php }
                    
                   ?>

                    
                </li>


                <li class="app-sidebar__heading">FEEDBACKS</li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#feedbacksModal" >
                        <i class="metismenu-icon pe-7s-chat">
                        </i>Ajouter des Feedbacks
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</div>  