<?php 


class BanglaConverter {
    public static $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    public static $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    
    public static function bn2en($number) {
        return str_replace(self::$bn, self::$en, $number);
    }
    
    public static function en2bn($number) {
        return str_replace(self::$en, self::$bn, $number);
    }
 }


                      $orgDate = $_POST["birthday"];  
                      $newDate = date("d-m-Y", strtotime($orgDate));  
                      $new= BanglaConverter::en2bn($newDate);


                      $memo= BanglaConverter::en2bn( $_POST["memo"]);

                      $a=$_POST["teacher"];
      
      
                      $conn=mysqli_connect("localhost","root","","faculty");
      
                              $sql="SELECT * FROM teacher WHERE t_name='" . $a . "'";
                              $result=mysqli_query($conn,$sql);
                          // $resultCheck=mysqli_num_rows($result);
      
                          // if($resultCheck>0)
                          // {
                              if (mysqli_num_rows($result) > 0)
                              {
                                  while($row = mysqli_fetch_assoc($result)) 
                                  {
                                  $d1= $row["designation"];
                                  $d2=$row["department"];
                                  }
      
                              }  
      
                              
                              mysqli_close($conn);


                              $y=BanglaConverter::en2bn($_POST["year"]);
                              $yr=$_POST["yr"];
                              $sub=$_POST["sub"];

                              $orgDate = $_POST["birthday1"];  
                              $newDate1 = date("d-m-Y", strtotime($orgDate));  
                              $y1= BanglaConverter::en2bn($newDate1);

                              $conn=mysqli_connect("localhost","root","","course_db");
                              $result11 = $_POST["sub"];
                              //$result_explode11 = explode('|', $result);
                              $query11="
  
                              SELECT chairman FROM subject
                              WHERE Subject_name='$result11'
  
  
                              ";
                              $result111=mysqli_query($conn,$query11);
                              $row=mysqli_fetch_array($result111);
  
  
                              $c= $row[0];
                             
                             

                              $time= BanglaConverter::en2bn($_POST["t"]);
                             
//$new= BanglaConverter::en2bn($a);
//echo $new;

                              $day=$_POST["day"];
                              $do=$_POST["do"];
                              mysqli_close($conn);


                              $conn=mysqli_connect("localhost","root","","letter");
                              $sql="INSERT INTO letter_data(MemoNo,SendingDate,Recipient,Designation,
                              Department,Year,Subject,StudyYear,MeetingDate,Daytime,Time,Chairman,Purpose,Type)
                              VALUES ('$memo','$new','$a','$d1','$d2','$y','$sub','$yr','$y1','$day','$time','$c','$do','C')";
                              $result=mysqli_query($conn,$sql);
                              mysqli_close($conn);



                              

?>
<?php
include("mpdf.php");
$mpdf=new mPDF('','A3',14,'nikosh'); 
ob_start();

echo "
<html>
<div class=\"contain\">

<style scoped>
     .contain{ border-style: solid;
               padding-left:125px;
               padding-top:100px;
           
      }
 </style>
<div class=\"row\">
<style scoped>
    
  

 

/* Clear floats after the columns */
.row:after {
    content: \"\";
      display: table;
      clear: both;
}
      }
 </style>

  <div class=\"column address\" >
  <style scoped>
 .column {
        
        float: left;

        height: 200px; /* Should be removed. Only for demonstration */
}

     .address{

width: 35%;


}
 </style>

  <strong>পরীক্ষা নিয়ন্ত্রকের অফিস</strong><br>
        <strong>ঢাকা বিশ্ববিদ্যালয়</strong><br>
        ঢাকা-১০০০,বাংলাদেশ।<br>
        ফোনঃ(অফিস)৮৬১৩২৮০<br>
        ৯৬৬১৯০০-৫৯/৪০৭৫<br>
        (বাসা)৯৬৬৬১৩৫<br>
        ফ্যাক্সঃ৮৮০-২-৯৬৬৭২২২<br>
        Email:examcontroller@du.ac.bd
  </div>
  <div class=\"column image\">

  <style scoped>
 .column {
        
        float: left;

        height: 200px; /* Should be removed. Only for demonstration */
}

     .image{

width: 35%;
padding-left:50px;
}
 </style>

  <p> <img src=\"DhakaUniversity.jpg\" width=\"70\" height=\"90\"></p>
  </div>
  
</div>



<div class=\"row\">
<style scoped>
    
  

 

/* Clear floats after the columns */
.row:after {
    content: \"\";
      display: table;
      clear: both;
}
      }
 </style>

  <div class=\"column p1\" >
  <style scoped>
 .column {
        
        float: left;

       /* Should be removed. Only for demonstration */
}

     .p1{

width: 35%;

padding-top:-20px;
height:30px;
}
 </style>

 <p> <p>মেমো নংঃ $memo শা-৫/প</p></p>
  </div>

  <div class=\"column p2\">

<style scoped>
.column {
      
      float: left;

     /* Should be removed. Only for demonstration */
}

   .p2{

width: 30%;

padding-left:270px;
padding-top:20px;
height: 50px;
}
</style>

তারিখঃ   $new
</div>
</div>


<div class=\"teacher\">
                <style scoped>
               .teacher{ width: 25%;

                    height: 100px;
                    padding-top:20px;       

                    }
                </style>

                         $a ,<br>
                         $d1,<br>
                         $d2 ।<br>
                 </div>

                

                <div class=\"main1\">

                     জনাব,
                </div>

               <div class=\"main2\">
               <style scoped>
               .main2
               {
               text-indent:60px;
               word-spacing: 8px;
              
               }

       </style>

               আপনাকে জানাইতেছি যে,  $sub বিষয়ে<br>   $y  সনের       $yr পরীক্ষার $do 
                করার জন্য পরীক্ষা কমিটির এক সভা <br>$y1 তারিখ রোজ  $day   $time  টায় ঢাকা বিশ্ববিদ্যালয়ের 
                 $sub   বিষয়ে<br> পরীক্ষা কমিটির  চেয়ারম্যান অধ্যাপক ডঃ জনাব   $c এর অফিস কক্ষে (________)<br>অনুষ্ঠিত হইবে।উক্ত সভাইয় যথাসময় উপস্থিত হইয়া প্রশ্নপত্র
                $do অংশ নেওয়ার <br>জন্য আপনাকে অনুরোধ করিতেছি।<br>
              
               </div>

               <div class=\"h\">

<style scoped>
.h
{
   margin-left:250px ;
   padding-top: 10px;
   padding-bottom:-20px;
   width: 30%;
   
   height:60px;
 
   padding-left: 300px;
}

       </style>

<p>আপনার বিশ্বস্ত</p>


</div>


<div class=\"g\">

<style scoped>
.g
{width: 25%;
padding-left:200px;
margin-left:300px;
text-indent:-4px;
height: 200px; 
}

       </style>

<img src=\"signature.jpg\" width=\"180\" height=\"50\">
     
<p style=\"margin-left:14%;\">পরীক্ষা নিয়ন্ত্রকের পক্ষে<br>
     পরীক্ষা উপ-নিয়ন্ত্রক<br>
     ঢাকা বিশ্ববিদ্যালয়।<br>
     </p>


</div>

<div class=\"row\">
<style scoped>
    
  

 

/* Clear floats after the columns */
.row:after {
    content: \"\";
      display: table;
      clear: both;
}
      }
 </style>

  <div class=\"column p1\" >
  <style scoped>
 .column {
        
        float: left;

       /* Should be removed. Only for demonstration */
}

     .p1{

width: 35%;

padding-top:-20px;
height:30px;
}
 </style>

 <p> <p>মেমো নংঃ $memo শা-৫/প</p></p>
  </div>

  <div class=\"column p2\">

<style scoped>
.column {
      
      float: left;

     /* Should be removed. Only for demonstration */
}

   .p2{

width: 30%;

padding-left:270px;
padding-top:20px;
height: 50px;
}
</style>

তারিখঃ   $new
</div>
</div>

<div class=\"main3\">
<style scoped>
               .main3
               {
               
               word-spacing: 8px;
              
               }

       </style>

                      অবগতি ও প্রয়োজনীয় ব্যবস্থা গ্রহণের জন্য অনুরোধসহ প্রতিলিপি প্রেরিত হইলঃ-<br>
                     ১।প্রফেসর/ড।/জনাব $c<br>

                     চেয়ারম্যান,<br>
                      $sub বিষয়ে পরীক্ষা কমিটি,<br>
                     ঢাকা বিশ্ববিদ্যালয়।<br>


                  </div>
                  <div class=\"s\">

<style scoped>
.s
{width: 25%;
padding-left:200px;
margin-left:300px;
text-indent:-4px;
height: 200px; 
}

       </style>

<img src=\"signature.jpg\" width=\"180\" height=\"50\">
     
<p style=\"margin-left:14%;\">পরীক্ষা নিয়ন্ত্রকের পক্ষে<br>
     পরীক্ষা উপ-নিয়ন্ত্রক<br>
     ঢাকা বিশ্ববিদ্যালয়।<br>
     </p>


</div>
                  
</div>

<html>
";



$html = ob_get_contents();
ob_end_clean(); 
$mpdf->WriteHTML($html);

$mpdf->Output();
exit;
?>
