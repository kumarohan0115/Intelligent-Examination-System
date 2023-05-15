USE dare_to_cheat_me ;
        create table exam_record (S_no int(11) PRIMARY KEY AUTO_INCREMENT , user_name varchar(100));
        create table subject_info( subject varchar(20) , no_question int(11) , duration int(10));
        create table teacher_info( Institute_name text , branch text,teacher_name varchar(100),Username varchar(50) , Password varchar(100),SubjectCode varchar(10));
        create table user_info( student_id int(6),branch text,name_student varchar(30),user_name varchar(50),password varchar(20) );