<?php


function main() {
    randomCourse();
    echo "<br /> <br />";
    echo "<hr>";
    courseList();
    
    
}
function randomCourse() {
    $randomValue = rand(0,10);
    $name = getCourseName($randomValue);
    
    $arrName = array();
    $arrName = str_split($name);
    echo "<span id=randomName>";
    for ($i=0; $i<count($arrName); $i++) {
        if ($i%2 != 0) {
            echo "<span class=odd>".$arrName[$i]."</span>";
        } else {
            echo "<span class=even>".$arrName[$i]."</span>";
        }
    }
    echo "</span>";
    echo "<br />";
    echo getCourseDescription($randomValue);
    
}


function getCourseName($value) {
    
    switch ($value) {
        case 0: $course = "CST 300: Major ProSeminar";
            break;
        case 1: $course = "CST 205: Multimedia Design and Programming";
            break;
        case 2: $course = "CST 363: Introduction to Database Systems";
            break;
        case 3: $course = "CST 338: Software Design";
            break;
        case 4: $course = "CST 311: Intro to Computer Networks";
            break;
        case 5: $course = "CST 336: Internet Programming";
            break;
        case 6: $course = "CST 361S: Technology Tutors";
            break;
        case 7: $course = "CST 325: Graphics Programming";
            break;
        case 8: $course = "CST 370: Design and Analysis of Algorithms";
            break;
        case 9: $course = "CST 438: Software Engineering";
            break;
        case 10: $course = "CST 499: Directed Group Capstone";
            break;
    }

    return $course;
}


function getCourseDescription($value) {
    $courseDescription = [
        "Helps students identify and articulate personal, professional, and social goals. Provides an integrated overview of the computer science and communication design majors and their requirements. Students develop a plan for their learning goals. Students learn writing, presentation, research and critical-thinking skills within the diversified fields of information technology and communication design. Students learn how to analyze, predict, and articulate trends in the academic, public service, [Prereq: (GE Areas A1 and A2 and A3) and (Junior or Senior Standing)]",
        "Introduces design, creation, and manipulation of interactive applications and electronic media for communication purpose. Focuses on creating media, understanding media concepts, and manipulating the created media using basic programming concepts of control flow, functions, expressions and data types in the Python language. Students acquire a basic understanding for digital media formats, how to design, create such media using basic programming skills.",
        "This course provides balanced coverage of database use and design,focusing on relational databases. Students will learn to design relational schemas, write SQL queries, access a DB programmatically,and perform database administration. Students will gain a working knowledge of the algorithms and data structures used in query evaluation and transaction processing. Students will also learn to apply newer database technologies such as XML, NoSQL, and Hadoop. (Prereq: CST 238 AND MATH 130)",
        "Provides students with the fundamental concepts to develop large-scale software, focusing on the object-oriented programming techniques. Coverage includes the introduction to Java programming language, object-oriented programming, software life cycle and development processes, requirements analysis, and graphical user interface development. (Prereq: CST 238)",
        "Survey of Telecomm and Data Comm Technology Fundamentals, Local Area Network, Wide Area Network, Internet and internetworking protocols including TCP/IP, network security and performance, emerging industry trends such as voice over the network and high speed networking. Designed as a foundation for students who wish to pursue more advanced network studies including certificate programs. Includes hands-on networking labs that incorporate Cisco CCNA lab components. (Prereq: CST 238 and MATH 130)",
        "Provides students with dynamic web application development skills, focusing on the PHP, MySQL, and JavaScript. Coverage includes the Internet architecture, XHTML, CSS, programming with PHP, database and MySQL, and client-side programming with JavaScript. (Prereq: CST 238)",
        "A service learning course in which students apply computer literacy, multimedia design, and technology to assist schools, nonprofit organizations, and community agencies. The theme for the course is Bridging the Digital Divide. Note: students must participate in required service placements with hours to be arranged. Students must be able to create and manage a web site. (Prereq: Junior or Senior Standing)",
        "This course teaches the students the fundamentals of game programming and skills needed for game development, including GPU programming, matrix and quaternion algebra for physics calculation, animation, lighting and basics of implementing 3D models into a framework. Prereq: (CST 238 AND MATH 130)",
        "Students learn important data structures in computer science and acquire fundamental algorithm design techniques to get the efficient solutions to several computing problems from various disciplines. Topics include the analysis of algorithm efficiency, hash, heap, graph, tree, sorting and searching, brute force, divide-and-conquer, decrease-and-conquer, transform-and-conquer, dynamic programming, and greedy programming. (Prereq: CST 238 AND MATH 170)",
        "Prepares students for large-scale software development using software engineering principles and techniques. Coverage includes software process, requirements analysis and specification, software design, implementation, testing, and project management. Students are expected to work in teams to carry out a realistic software project. (Prereq: CST 338)",
        "Students will work on a project in large groups (up to 5 students in each group), developing requirements specification, a solution plan followed by design and implementation of the solution. The problem statement for the projects will be selected by the faculty. Faculty will also play the role of a project manager directing the schedule and deliverables for these projects. (Prereq: CST 300)"
    ];
    
    if (array_key_exists($value, $courseDescription)) {
        return $courseDescription[$value];
    }
}


function courseList() {
    echo "<br /> <br />";
    echo "<table>";
    
    echo "<tr>";
    echo "<th id=cName>Course Name</th>";
    echo "<th id=cDes>Course Description</th>";
    echo "<th id=status>Status</th>";
    echo "</tr>";
    
    
    for ($i=0; $i<11; $i++) {
        echo "<tr>";
        echo "<td>".getCourseName($i)."</td>";
        echo "<td>".getCourseDescription($i)."</td>";
        if ($i < 5) {
            echo "<td><img src='img/green-checkmark.png' alt='green checkmark' /></td>";
        } else {
            echo "<td><img src='img/red-x.png' alt='red x' /></td>";
        }
        
        echo "</tr>";
    }
    
    echo "</table>";
}



?>