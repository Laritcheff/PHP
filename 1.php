<?php
/*простые числа*/
    function findSimple($a, $b){
        for($i=0;$a<=$b;$i++){           
            $simple[]=$a;                       
                    $a++;
        }  $count=0;
            foreach($simple as $v){
                        for($k=2;$k<$b;$k++){
                        if(($v%$k==0)&&($v!=$k)){                            
                        unset($simple[$count]);
                                       }
               $count++;                               
                        }
                          return $simple;   
    }  
    } 
     for($i=1;$i<13;$i++){
            $d[]=$i;}
            

         function createTrapeze($a){
                $j=0;
                $count=count($a)/3;    
               for($i=0;$i<$count;$i++) { 
                    $out=array_slice($a,$j,3);                                        
                    $array[]=["a"=>$out[0],"b"=>$out[1],"c"=>$out[2]];              
                    $j+=3;                                       
                   }                  
                foreach($array as $key=>$e){echo "$key=$e[a]<br>"; 
         }               
         }               
         
            createTrapeze($d);

?>