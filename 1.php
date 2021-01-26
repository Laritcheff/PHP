<?php
    function findSimple($a, $b){
        for($i=0;$a<=$b;$i++){           
            $simple[]=$a;                       
                    $a++;
        }  $count=0;
            foreach($simple as $v){
                        for($k=2;$k<$b;$k++){
                      if(($v%$k==0)&&($v!=$k)){                            
                        unset($simple[$count]);
                            /*echo $v.'<br>';*/}  
                        }  
                            $count++;                               
                        }
                          return $simple;
    
    }
            
    
       echo findSimple(1,1250);
           
 

?>