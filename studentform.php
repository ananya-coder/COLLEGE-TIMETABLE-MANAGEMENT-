<!DOCTYPE html>

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <link rel = "stylesheet" href = "bootstrap.css">
    <link rel = "stylesheet" href = "flexslider.css">
</head>
<body>
<style>


#menu {
    background-color: lightcyan;
    color: #fff;
    font-size: 12px;
    font-weight: 900;
    letter-spacing: 1px;
    min-height: 70px;
}



.navbar-inverse .navbar-nav > li > a, .navbar-inverse .navbar-nav > li > a:hover {
    color: #000000;
    padding: 12px 10px;
}


.modal {
    display: none; 
    position: fixed;
    z-index: 1; 
    left: 0;
    top: 0;
    opacity: 1;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0, 0, 0); 
    background-color: rgba(0, 0, 0, 0.4); 
    -webkit-animation-name: fadeIn; 
    -webkit-animation-duration: 0.4s;
    animation-name: fadeIn;
    animation-duration: 0.4s
}


.modal-content {

    position: fixed;
    top: 25%;
    left: 35%;
    background-color: #fff;
    width: 30%;
    -webkit-animation-name: slideIn;
    -webkit-animation-duration: 0.4s;
    animation-name: slideIn;
    animation-duration: 0.4s
}

.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 5px 20px;
    background-color: #000000;
    color: white;
}

.modal-body {
    padding: 2px 16px;
}

.modal-footer {
    padding: 2px 16px;
    background-color: #FFFFFF;
    color: white;
}


@-webkit-keyframes slideIn {
    from {
        top: 0;
        opacity: 0
    }
    to {
        top: 25%;
        opacity: 1
    }
}

@keyframes slideIn {
    from {
        top: 0;
        opacity: 0
    }
    to {
        top: 25%;
        opacity: 1
    }
}

@-webkit-keyframes fadeIn {
    from {
        opacity: 0
    }
    to {
        opacity: 1
    }
}

@keyframes fadeIn {
    from {
        opacity: 0
    }
    to {
        opacity: 1
    }
}


#footer {
    padding: 5px 20px;
    background-color: lightcyan;
    text-align: right;
    color: #fff;
    font-size: 15px;
}
    </style>
    <div id="TT" style="background-color: #FFFFFF">
    <table border="2" cellspacing="3" align="center" id="timetable">
        <caption>
            <strong><br><br>
                <?php
                if (isset($_POST['select_semester'])) {
                    echo "COMPUTER ENGINEERING DEPARTMENT SEMESTER " . $_POST['select_semester'] . " ";
                    $year = (int)($_POST['select_semester'] / 2) + $_POST['select_semester'] % 2;
                    $r = mysqli_fetch_assoc(mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"), "SELECT * from classrooms
                                WHERE status = '$year'"));
                    echo " ( " . $r['name'], " ) ";
                }
                ?>
            </strong>
        </caption>
        <tr>
            <td style="text-align:center">WEEKDAYS</td>
            <td style="text-align:center">8:00-8:50</td>
            <td style="text-align:center">8:55-9:45</td>
            <td style="text-align:center">9:50-10:40</td>
            <td style="text-align:center">10:45-11:35</td>
            <td style="text-align:center">11:40-12:30</td>
            <td style="text-align:center">12:30-1:30</td>
            <td style="text-align:center">1:30-4:00</td>
        </tr>
        <tr>
            <?php
            $table = null;
            if (isset($_POST['select_semester'])) {
                $table = " semester" . $_POST['select_semester'] . " ";
            } else
                echo '</table>';
            if (isset($_POST['select_semester']) ) {
                $q = mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"),
                    "SELECT * FROM" . $table);
                $qq = mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"),
                    "SELECT * FROM subjects");
                $days = array('MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY');
                $i = -1;
                $str = "<br>";
                if (isset($_POST['select_semester'])) {
                    while ($r = mysqli_fetch_assoc($qq)) {
                        if ($r['isAlloted'] == 1 && $r['semester'] == $_POST['select_semester']) {
                            $str .= $r['subject_code'] . ": " . $r['subject_name'] . " ";
                            if (isset($r['allotedto'])) {
                                $id = $r['allotedto'];
                                $qqq = mysqli_query(mysqli_connect("localhost", "ananya", "ananya1234", "timetable"),
                                    "SELECT * FROM teachers WHERE faculty_id = '$id'");
                                $rr = mysqli_fetch_assoc($qqq);
                                $str .= " " . $rr['faculty_name'] . " ";
                            }
                            if ($r['course_type'] !== "LAB") {
                                $str .= "<br>";
                                continue;
                            } else {
                                $str .= ", ";
                            }
                            
                        }
                    }
                }
                while ($row = mysqli_fetch_assoc($q)) {
                    $i++;
                    echo "
                 <tr><td style=\"text-align:center\">$days[$i]</td>
                 <td style=\"text-align:center\">{$row['period1']}</td>
                <td style=\"text-align:center\">{$row['period2']}</td>
                <td style=\"text-align:center\">{$row['period3']}</td>
                 <td style=\"text-align:center\">{$row['period4']}</td>
                  <td style=\"text-align:center\">{$row['period5']}</td>
                  <td style=\"text-align:center\">LUNCH</td>
                  <td style=\"text-align:center\">{$row['period6']}</td>
                </tr>\n";
                }
                echo '</table>';
                $sign = "GENERATED VIA TIMETABLE MANAGEMENT SYSTEM, COMPUTER ENGINEERING DEPARTMENT, AMU.";
                if (isset($_POST['select_semester'])) {
                    echo "<div align=\"center\">" . "<br>" . $str . "<br>
                            <strong>" . $sign . "<br></strong></div>";
                }
                unset($_GET['generated']);
            } else {
                header("location:index.php?semester=true");

            }
            ?>
</div>
<script type="text/javascript">
    function gendf() {
        var doc = new jsPDF();
        doc.addHTML(document.getElementById('TT'), function () {
            doc.save('<?php echo "timetable semester " . $_POST["select_semester"]?>' + '.pdf');
            alert("Downloaded!");
        });
    }
</script>
<div align="center" style="margin-top: 10px">
    <button id="saveaspdf" class="btn btn-info btn-lg" onclick="gendf()">SAVE AS PDF</button>
</div>
</body>
</html>