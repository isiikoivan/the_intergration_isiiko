
<?php
class Crud
    {// function to connect to the database
        function dbconnect($host,$dbname,$user,$password)
        {
            try{
            $dns="mysql:host=$host; dbname=$dbname";
            $GLOBALS['pdo']= new PDO($dns,$user,$password);
            $pdo=$GLOBALS['pdo'];

           // echo 'connected';
            }
            catch(PDOException $e)
            {
            echo $e;
            //.getMessage()
            }

            return $pdo;
        }
      //  $GLOBALS['image_name'] = $image_naming;
               // function to insert universally//
        function universal_insert($pdo,$c=array(),$btn_name)
        {
            if(isset($_POST[$btn_name]))
            {
                                   //index 1 holds the table name
            $tables=$c[0];
            echo "\n\t\ttable name\n\t\t";
            echo $tables;

            //index >1 and <length($c/2) hold the columns in the table
            $columns=array();
            for($n=1; $n<=((count($c)-1)/2); $n++)
            {
                //echo $c[$n];
                array_push($columns,$c[$n]);

            }
            echo "\n\t\tcolumns in the db\t\t \n";
             print_r($columns);

            // echo $columns;

             //index >length($c/2) and <length($c) hold the values in the table //loops thru the values
             $values=array();//array is created once
            
             $target_dir="../files/";
             for($n=((count($c)+1)/2);$n<=(count($c)-1);$n++)
             {
              $check_type=is_array($c[$n]);
              if($check_type){
               //$t_dir=mkdir("assests\files");
             

             $target_file=basename($_FILES['image']['name']);
             $target_folder = $target_dir.$target_file;
             $temp = $_FILES['image']['tmp_name'];

             // uploading files into file
             move_uploaded_file ($temp,$target_folder);

               $c[$n]=$target_file;


              }
                 array_push($values,$c[$n]);

            }
             echo "\n\t\tvalues to be input to db\t\t\n";
             print_r($values);


             //derivation of placeholders eg :name from column names concatination keys with :
             $placeholders=array();
             for($v=1; $v<=((count($c)-1)/2); $v++)
             {
               $concatenate=':'.$c[$v];
                array_push($placeholders,$concatenate);

             }
             echo "\n\t\tplace holders\t\t\n";
             print_r($placeholders);


             //converting keys into strings
             $keys=array();
             for($v=1; $v<=((count($c)-1)/2); $v++)
             { //establishing a single array that is to be converted to strings the excute function
                 $singlearr=array();
                 $conc_keys=':'.$c[$v];
                 array_push($singlearr,$conc_keys);
                //  print_r($singlearr);
                 $string_keys=implode($singlearr);

                array_push($keys,$string_keys);

             }
             echo "\n\t\tkeys\n\t\t\t";
             // echo $keys[0];
             print_r($keys);

             //pairing up keys and values for the excute function
             //dealing with $keys array and $values array
             $exc_array=array();
             for($n=0;$n<=(count($values)-1);$n++)
             {
                $exc_array[$keys[$n]]=$values[$n];
                // array_push($exc_array,$assign);

             }
             // echo "\n \t excute implode";
             //converting into a stirng
             // print_r($exc_array[':email']);

             echo "\n \t\t\t excute array\t\t\t";
             print_r($exc_array);

             //feeds  to the sql
             $ins_columns=implode(",",$columns);
             $ins_values=implode(",",$placeholders);


            $sql="INSERT INTO $tables ($ins_columns) VALUES ($ins_values)";
            $stmt=$pdo->prepare($sql);
            $sub=$stmt->execute($exc_array);
            if($sub)
            {

               echo $message='data inserted successfully';
            }
            else
            {
               echo $message='failed to submit';
            }
            }

        }



        function retriving($c=array())
        {
          //two values
            $pd=$c[0];
            $tab=$c[1];
            $sql = "SELECT * FROM $tab";
            $stmt=$pd->prepare($sql);
            $stmt->execute();
            $GLOBALS['dat'] = $stmt->fetchAll(PDO::FETCH_OBJ);
            $data=$GLOBALS['dat'];
            return $data;

        }

    //locate the value to be updated

        function locate($pdo,$id,$table_name)
        {

                $sql= "SELECT * FROM $table_name WHERE id=:id";
                $stmt=$pdo->prepare($sql);
                $stmt->execute([':id'=>$id]);
                $data=$stmt->fetch(PDO::FETCH_OBJ);
                // $dc=array($data);
                return $data;
        }
//update the value located
        function updating($pdo,$d=array(),$id,$btn_name,$page_location)
        {

                if(isset($_POST[$btn_name]))
                {
                    //index 1 holds the table name
                    $tables=$d[0];
                    echo "\n\t\ttable name\n\t\t";
                    echo $tables;

                    //index >1 and <length($c/2) hold the columns in the table
                    $columns=array();
                    for($n=1; $n<=((count($d)-1)/2); $n++)
                    {
                        //echo $c[$n];
                        array_push($columns,$d[$n]);

                    }
                    echo "\n\t\tcolumns in the db\t\t \n";
                     print_r($columns);

                    // echo $columns;

                     //index >length($c/2) and <length($c) hold the values in the table //loops thru the values
                     $values=array();
                       $target_dir="files/";
                       //array is created once
                     for($n=((count($d)+1)/2);$n<=(count($d)-1);$n++)
                     {
                          $check_type=is_array($d[$n]);
                         if($check_type){
                          //$t_dir=mkdir("assests\files");

                        $target_file=$target_dir.basename($_FILES['pimage']['name']);
                        //     $target_dir="files/";
                           move_uploaded_file($_FILES['pimage']['tmp_name'],$target_file);

                          $d[$n]=$target_file;

                        //   }

                         }
                         array_push($values,$d[$n]);

                    }
                    array_push($values,$id);
                     echo "\n\t\tvalues to be input to db \t\t\n";
                     print_r($values);

                     print($target_dir);
                     print($target_file);


                     //derivation of placeholders eg :name from column names concatination keys with :
                     $placeholders=array();
                     for($v=1; $v<=((count($d)-1)/2); $v++)
                     {
                       $concatenate=':'.$d[$v];
                        array_push($placeholders,$concatenate);

                     }
                     echo "\n\t\tplace holders\t\t\n";
                     print_r($placeholders);


                     //converting keys into strings
                     $keys=array();
                     for($v=1; $v<=((count($d)-1)/2); $v++)
                     { //establishing a single array that is to be converted to strings the excute function
                         $singlearr=array();
                         $conc_keys=':'.$d[$v];
                         array_push($singlearr,$conc_keys);
                        //  print_r($singlearr);
                         $string_keys=implode($singlearr);

                        array_push($keys,$string_keys);

                     }
                     array_push($keys,':id');
                     echo "\n\t\tkeys\n\t\t\t";
                     // echo $keys[0];
                     print_r($keys);

                     //pairing up keys and values for the excute function
                     //dealing with $keys array and $values array
                     $exc_array=array();
                     for($n=0;$n<=(count($values)-1);$n++)
                     {
                        $exc_array[$keys[$n]]=$values[$n];
                        // array_push($exc_array,$assign);

                     }
                    //  array_push($exc_array,['id']=$id);
                     echo "\n \t excute implode";
                     //converting into a stirng
                    //  print_r($exc_array[':emails']);

                     echo "\n \t\t\t excute array\t\t\t";
                     print_r($exc_array);

                        ////isiiko start two
                        $update_func=array();
                        for($n=0; $n<=(count($columns)-1); $n++)
                        {

                        $s=$columns[$n].'='.$placeholders[$n];
                            array_push( $update_func,$s);

                        }
                        echo "\n\t\tupdating setting in the db\t\t \n";
                        print_r($update_func);

                     //feeds  to the sql
                     $ins_update=implode(',',$update_func);

                     echo $ins_update;

                    $sql="UPDATE  $tables SET $ins_update WHERE id=:id";

                    $stmt=$pdo->prepare($sql);
                    $sub=$stmt->execute($exc_array);
                    if($sub)
                    {

                       echo $message='data updated successfully';
                       header("Location:$page_location");
                    }
                    else
                    {
                       echo $message='failed to update';
                    //    header("Location:$page_location");
                    }
                }


        }

    //function to delete

        function deleting($pdo,$id,$table_name,$destination)
        {  echo 'successfully deleted1';

        //    if(isset($_POST[$btn_name]))
        //    {
            $sql="DELETE FROM $table_name WHERE id=:id";
            $stmt=$pdo->prepare($sql);
            $exe=$stmt->execute([':id'=>$id]);

             echo 'successfully deleted';
             header("Location:$destination");


            // }

        }

        function verifying($pdo,$inputval1,$inputval2,$tab,$page_location,$done=array(),$usernamecol,$passwordcol)
        {
            session_start();



           $limit_3=array();

            for($n=0;$n<=(count($done)-2);$n++)
            {
                $arr_comparison_values=array();
                $to_or=$done[$n].'=:input';
                // if($n<(count($done)-2))
                // {
                //     $to_or.'OR';

                // }
                array_push($limit_3,$to_or);


            }
            echo 'string and params';
            // print_r($limit_3);
            $lim = implode(" OR ",$limit_3);
            // echo $lim;
            // echo "iama";


            //pswd value last in the array

            for($n=(count($done)-2);$n<=(count($done)-1);$n++)
            {
                $arr_pswd=$done[$n].'=:password';

            }

            $and = ' AND '.$arr_pswd;
            // echo 'password';
        //  echo $and;


            $sql = "SELECT * FROM $tab WHERE $lim  $and";
            $stmt=$pdo->prepare($sql);
            $stmt->execute([':input'=>$inputval1,':password'=>$inputval2]);
            $user= $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['all_data']=$user;

            $count=$stmt->rowCount();
            $counting = rowCount($user);
            $_SESSION['amount']=$counting;


            if($count > 0 &&  $user['username']==$inputval1 || $user['contact']==$inputval1 || $user['email']==$inputval1 &&  $user[$passwordcol]==$inputval2)
            {


                // $user=$_SESSION['take'];
                echo "logged in successfully";

                //$user= $stmt->fetch(PDO::FETCH_ASSOC);
                echo ' possible';
              header("Location:$page_location");
            }
            else{
                echo 'not possible';
              return  $err_msg='<label>wrong password or username</label>';
            }
        }
        function loggingout($page_location)
        {
            session_start();
            session_destroy();
            header("location:$page_location");


        }
//validating text validating_onebyone
        function validating_onebyone($vt_value,$textif,$textelse)
        {
          if(isEmpty($vt_value)){$message=$textif;}
          else{$message=$textelse;}
          return $message;
        }
        //validating text validating all xtics
        function validating_all($vt_value,$text)
        {


        }
        //validating text validating password
        function validate_password($vt_value,$len,$feedback1,$feedback2)
        {
          //Empty
          //length



        }
        //validating text validating_email
        function validate_email($vt_value,$text)
        {


        }
        //validating text validating_phone_number
        function validating_phone($vt_value,$text)
        {


        }

        function verifycompare($value1,$value2){

          //$value1==$value2

        }



    }
